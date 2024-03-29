<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Mail\SendMailBemVindo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\People;
use App\Models\Institution;
use App\Models\People_Aud;
use App\Models\Users_Account;
use App\Models\User;
use App\Models\Users_Account_Aud;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Mail;

class WizardCustomController extends Controller
{
    use SoftDeletes;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index($id)
    {
        //mater toda a sessao
        session()->forget('schema');
        session()->forget('key');
        session()->forget('conexao');

        //consultar o schema
        Config::set('database.connections.admin');
        $results = Institution::where('unique_id', '=', $id)->first();


        //se a selecao da conta estiver vazio
        if ($results == null) {
            session()->flash("info", "Link inválido");
            return redirect('login');
        } else
            //inserir na array dos dados
            session()->put('schema', $results->tenant);

        //inserir o código
        session()->put('key', $results->id);

        // Setando os dados da nova conexão.
        Config::set('database.connections.tenant.schema', $results->tenant);

        //inserir o nome da conta para envio do email
        session()->put('conta_name', $results->name_company);

        //se o usuario for integrador ele abre a edição da conta
        if ($results->compartilhar_link == false or $results->deleted_at == !null or session()->get('key') == null) {
            session()->flash("info", "Link inválido");
            return redirect('login');
        };
        //se o usuario for integrador ele abre a edição da conta
        if (Auth::check() == true) {
            session()->flash("warning", "Necessário deslogar da conta para acessar o Link!");
            return redirect('account');
        };
        //retornar
        return view('auth.wizardCustom');
    }

    public function create()
    {
        // apenas para redirecionar quando é digitado direto o share na url
        session()->flash("info", "Link inválido");
        return redirect('login');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' => 'required|captcha',
        ]);
        //pegar tenant da conta selecionada
        $value = session()->get('schema');
        Config::set('database.connections.tenant.schema', $value);
        //validar se tem precadastro já realizado
        $validarcadastro = People::where('email', $request->input('email'));
        //se nao possuir precadastro
        if ($validarcadastro->count() == 0) {

            //cadastrar a pessoa localmente na conta
            $people = new People();
            $people->name          = strtoupper($request->input('name') . ' ' . $request->input('lastname'));
            $people->email         = $request->input('email');
            $people->phone        = $request->input('phone_full');
            $people->status_id = '14'; //ativo
            $people->is_verify       = 'true';
            $people->role = '2'; //membro
            //aceitou o termo?
            $termo = $request->has('agree') ? 1 : 0;
            //gerar hash
            $pwa = $request->input('password');
            //criar o usuario
            $user =  User::create([
                'name' => $people->name,
                'email' => $people->email,
                'password' => Hash::make($pwa), //gerar senha
                'phone' =>  $people->phone,
                'agree' => $termo,
            ]);
            //associar ao user
            $user->assignRole('user');
            //gerar a sessão para poder pegar o ID (nao funcionou)
            $request->session()->regenerate();
            //vincular o user e salvar (temporario)
            $people->user_id = $user->id;
            $people->save();
            //adicionar auditoria
            People_Aud::create([
                'id' => $people->id,
                'name' => $people->name,
                'email' => $people->email,
                'phone' => $people->phone,
                'role' => $people->role,
                'status_id' => $people->status_id,
            ]);
            //validar email agora cadastrado
            $validaruser = User::where('email', $people->email)->get();
            //associar usuário a pessoa na conta local se tiver
            $associar = People::where('email', $people->email)->first();
            $associar->user_id = $validaruser->first()->id;
            $associar->save();
            //disparar o email
            $conta_name = session()->get('conta_name');
            $email = $people->email;
            Mail::to($people->email)->send(new SendMailBemVindo($conta_name, $email, $pwa));

            //criar vinculo com a conta
            $this->criar($user->id, session()->get('key'), $people->id);
            //adicionar log local
           // $this->adicionar_log_global('14', 'C', $user);
            //adicionar log
           // $this->adicionar_log('10', 'C', $people);

            

            session()->flash("success", 'Cadastrado com sucesso, enviaremos seu dados de acesso por e-mail');
            return redirect(RouteServiceProvider::HOME);
        } else {
            //se tiver precadastro
            session()->flash("info", "Você já possuiu vinculo, favor logar em sua conta");
            return redirect()->route('login');
        }
    }

    public function criar($user_id, $account_id, $people_id): array
    {
        FacadesDB::beginTransaction();
        //criar vinculo com a conta
        $useraccount = new Users_Account();
        $useraccount->user_id = $user_id;
        $useraccount->account_id = $account_id;
        $useraccount->people_id = $people_id;
        $useraccount->save();

        if ($useraccount) {
            //adicionar log
            //$this->adicionar_log_global('11', 'C', $useraccount);
            FacadesDB::commit();
            //auditoria do vinculo com a conta
            Users_Account_Aud::create([
                'id' =>  $useraccount->id,
                'user_id' => $user_id,
                'account_id' => $account_id,
                'people_id' => $people_id,
                'created_at' => date('Y-m-d H:i:s')
            ]);

            return [
                'success' => true,
                'message' => 'Criado o acesso!',
            ];
        } else {

            FacadesDB::rollback();

            return [
                'success' => false,
                'message' => 'Ocorreu um erro!',
            ];
        }
    }
}
