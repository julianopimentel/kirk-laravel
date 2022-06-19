<?php

namespace App\Http\Controllers;

use App\Models\Account_Integrador;
use App\Models\Account_Transations;
use Illuminate\Http\Request;
use App\Models\Institution;
use App\Models\Status;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use App\Models\Users_Account;
use App\Models\Users_Account_Aud;
use Illuminate\Support\Facades\Auth;


class InstitutionsController extends Controller
{

    private $totalPagesPaginate = 8;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('throttle:1,0.001');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //user data
        $you = auth()->user();
        //mater toda a sessao da conta
        //session()->forget('schema');
        session()->forget('key');
        session()->forget('conexao');
        session()->forget('conta_name');
        //consultar contas associada ao usuario
        $institutions = Users_Account::where('user_id', $you->id)
            ->with('accountlist')
            ->with('status')
            //  ->orderby('name_company', 'asc')
            ->paginate($this->totalPagesPaginate);


        //integrador com acesso total
        if (Auth::user()->menuroles == 'admin') {
            //consultar accounts
            $institutions = Institution::with('getintegrador')
                ->with('status')
                ->wherenull('deleted_at')
                ->orderby('name_company', 'asc')
                ->paginate($this->totalPagesPaginate);

            //consultar integradores
            $integradores = Account_Integrador::get();

            return view('account.ListAdmin', compact('you', 'integradores'), ['institutions' => $institutions]);
            //caso o user possuia uma conta vinculado
        } elseif ($institutions->count() == 1 and $you->menuroles == 'user' and $you->master == false) {
            foreach ($institutions as $element) {
                $a = $element->tenant;
            }
            return redirect()->route('tenantget', $element->account_id);
            //user acima 
        } else
            return view('account.List', compact('you', $you), ['institutions' => $institutions]);
    }

    public function license_index()
    {
        //user data
        $you = auth()->user();
        //consulta de contas ativas
        $countinst = Institution::where('integrador', $you->integrador_id)->whereNull('deleted_at')->count();
        //mumero de licenças
        $license = Account_Integrador::where('user_integrador', $you->id)->first();
        //consulta de contas ativas
        $pagamentos = Account_Transations::where('user_id_integrador', $you->integrador_id)->orderby('id', 'desc')->paginate(6);
        return view('account.License', compact('countinst', 'pagamentos', 'license'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //user data
        $you = auth()->user();
        //buscar a conta
        $institution = Institution::find($id);
        //carregar status
        $statuses = Status::all()->where("type", 'system');
        //se o usuario for integrador ele abre a edição da conta
        if ($institution->integrador == $you->integrador_id and $institution->deleted_at == null) {
            return view('account.EditForm', compact('institution'), ['statuses' => $statuses]);
        };
        //se não for, retorna um erro generico
        session()->flash("error", 'Error interno');
        return redirect('account');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //user data
        $you = auth()->user();
        //consultar contas ativas do integrador
        $countinst = Institution::where('integrador', $you->integrador_id)->whereNull('deleted_at')->count();

        //mumero de licenças
        $license = Account_Integrador::select('license', 'user_integrador')->where('user_integrador', $you->id)->first();

        //se tiver licença indisponivel, retorna com erro
        if ($countinst >= $license->license) {
            $request->session()->flash("error", 'events.error_license');
            return redirect('account');
        };
        //carregar status
        $statuses = Status::all()->where("type", 'system');

        return view('account.createForm', ['statuses' => $statuses]);
    }

    public function store(Request $request)
    {
        //user data
        $user = auth()->user();
        //consultar contas ativas do integrador
        $countinst = Institution::where('integrador', $user->integrador_id)->whereNull('deleted_at')->count();

        //mumero de licenças
        $license = Account_Integrador::select('license', 'user_integrador')->where('user_integrador', $user->id)->first();

        //se tiver licença indisponivel, retorna com erro
        if ($countinst >= $license->license) {
            $request->session()->flash("error", 'events.error_license');
            return redirect('account');
        };
        //valida se tem os dados essencial
        $validatedData = $request->validate([
            'name_company'             => 'required|min:1|max:150',
            'type'           => 'required',
        ]);
        //tratamento no nome para criar o esquema
        $string = $request->input('name_company');
        $string_novo = strtolower(preg_replace(
            "[^a-zA-Z0-9-]",
            "-",
            strtr(
                utf8_decode(trim($string)),
                utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),
                "aaaaeeiooouuncAAAAEEIOOOUUNC-"
            )
        ));
        error_log('Criando account');

        //pegar o ultimo id e usar como referencia
        $contador = Institution::latest('id')->get()->first()->id;
        //somar a contagem com +1
        $tenant1 = ($string_novo) . '_' . strval($contador + 1);

        $institution = new Institution();
        $institution->name_company      = $request->input('name_company');
        $institution->email      = $request->input('email');
        $institution->doc      = $request->input('doc');
        $institution->mobile      = $request->input('phone_full');
        $institution->tenant        = preg_replace('/[ -]+/', '_', $tenant1);
        $institution->address1       = $request->input('address1');
        $institution->address2       = $request->input('address2');
        $institution->city       = $request->input('city');
        $institution->state       = $request->input('state');
        $institution->cep       = $request->input('cep');
        $institution->lat       = $request->input('lat');
        $institution->lng       = $request->input('lng');
        $institution->status_id = $request->input('type');
        $institution->country       = $request->input('country');
        $institution->compartilhar_link       = $request->has('compartilhar_link') ? 1 : 0;
        $institution->integrador = $user->integrador_id;
        $institution->save();
        //adicionar log
        $this->adicionar_log_global('9', 'C', $institution);
        //adicionar vinculo com a conta
        $useraccount = new Users_Account();
        $useraccount->user_id = $user->id;
        //Getting Last inserted id
        $useraccount->account_id = $institution->id;
        $useraccount->people_id = '1';
        //criar o esquema (gambiarra)
        error_log('Criando Schema');
        DB::select('CREATE SCHEMA ' . $institution->tenant);
        //limpar o migration (gambiarra)
        Config::set('database.connections.tenant.schema',  $institution->tenant);
        //conexao do tenant
        //DB::reconnect('tenant');
        set_time_limit(160);
        error_log('Iniciando o migrate');
        $migrated = Artisan::call('migrate --seed --database=tenant');
        if (!$migrated) {
            //salvar vinculo com a conta se ocorrer tudo bem
            $useraccount->save();
            //adicionar log
            $this->adicionar_log_global('11', 'C', $useraccount);
            $request->session()->flash("success", 'events.change_create');
            //adicionar log
            $this->adicionar_log_global('9', 'C', '{"schema":"' . $institution->tenant . '"}');
            //adicionar pessoa na conta como admin e assim acessar sem erro de vinculo
            DB::table($institution->tenant . '.people')->insert([
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'status_id' => '14',
                'is_admin' => 'true',
                'role' => '1',
            ]);
            //auditoria do vinculo com a conta
            Users_Account_Aud::create([
                'id' =>  $useraccount->id,
                'user_id' => $useraccount->user_id,
                'account_id' => $useraccount->account_id,
                'people_id' => '1',
                'created_at' => date('Y-m-d H:i:s')
            ]);
            //finalizar a conexao do tenant
            DB::purge('tenant');
            //reconectar a base
            DB::reconnect('pgsql');
            // Back to the default
            error_log('Finalizando o migrate');
            set_time_limit(30);
            return redirect()->route('account.index');
        }
        error_log('Erro ao rodar migrations');
        //retornar com mensagem de erro
        $request->session()->flash("danger", 'Erro ao rodar migrations');
        return redirect()->route('account.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name_company'             => 'required|min:1|max:150',
            'type'           => 'required',
        ]);
        $institution = Institution::find($id);
        $institution->name_company      = $request->input('name_company');
        $institution->doc      = $request->input('doc');
        $institution->email      = $request->input('email');
        $institution->mobile      = $request->input('phone_full');
        $institution->address1       = $request->input('address1');
        $institution->address2       = $request->input('address2');
        $institution->city       = $request->input('city');
        $institution->state       = $request->input('state');
        $institution->lat       = $request->input('lat');
        $institution->lng       = $request->input('lng');
        $institution->cep       = $request->input('cep');
        $institution->status_id = $request->input('type');
        $institution->compartilhar_link       = $request->has('compartilhar_link') ? 1 : 0;
        //adicionar log
        $this->adicionar_log_global('9', 'U', $institution);
        $institution->save();
        $request->session()->flash("success", 'events.change_update');
        return redirect()->route('account.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $institution = Institution::find($id);
        //validar se você é o dono da conta
        if (Auth::user()->integrador_id == $institution->integrador) {
            if ($institution) {
                $institution = Institution::find($id);
                //inativar a conta
                $institution->deleted_at          = date('Y-m-d H:m:s');
                //adicionar log
                $this->adicionar_log_global('9', 'D', $institution);
                $institution->save();
            }
            //consultar pessoas vinculadas
            $User_account = Users_Account::where('account_id', '=', $id);
            if ($User_account) {
                //deletar vinculos de todas as pessoas
                $User_account->delete();
                $this->adicionar_log_global('11', 'D', '{"delete_account_list":"' . $id . '"}');
            }

            $request->session()->flash("warning", 'events.change_delete');
            return redirect()->route('account.index');
        } else
            //se não for, retorna um erro generico
            session()->flash("error", 'Error interno');
        return redirect('account');
    }
}
