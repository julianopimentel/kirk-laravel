<?php

namespace App\Http\Controllers;

use App\Mail\SendMailBemVindo;
use App\Mail\SendMailCancelar;
use App\Mail\SendMailLiberar;
use App\Models\City;
use App\Models\Config_system;
use App\Models\Country;
use App\Models\Institution;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\People;
use App\Models\People_Aud;
use App\Models\People_Groups;
use App\Models\Roles;
use App\Models\State;
use App\Models\Users_Account;
use App\Models\User;
use App\Models\People_Notes;
use App\Models\Users_Account_Aud;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Mail;

class PeoplesController extends Controller
{
    private $totalPagesPaginate = 10;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission');
        $this->middleware('system');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(People $people)
    {
        //user data
        $you = auth()->user();
        //validar se selecionou a conta
        $this->get_tenant();
        //buscar
        $peoples = People::orderBy('name', 'asc')
            ->with('status')
            ->with('roleslocal')
            ->where('is_admin', false)
            ->where('status_id', '14')
            ->paginate($this->totalPagesPaginate);
        //status
        $statuses = Status::all()->where("type", 'people');

        return view('people.index', compact('peoples', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //pegar o tenant
        $this->get_tenant();
        //status
        $statuses = Status::all()->where("type", 'people');
        //campos obrigatório
        $campo = Config_system::find('1')->first();
        //roles 
        $roles = Roles::all();
        //localicazao da conta
        $locations = Institution::find(session()->get('key'));
        //se tiver vazio, retornar para validar, mas vai carregar a tela de criação de pessoa
        if ($campo->geolocation == true) {
            if ($locations->lng == null or $locations->lat == null) {
                session()->flash("info", "Necessário informar a localização na conta para exibição correta do mapa");
            }
        }
        //localidade normal
        $countries = Country::get(["name", "id"]);

        return view('people.createForm', compact('locations'), ['statuses' => $statuses, 'roles' => $roles, 'countries' => $countries]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->all([
            'name'             => 'required|min:1|max:255',
            'country-dd'             => 'required|min:1|max:255',
        ]);

        $people = new People();
        $nome = ($request->input('name') . ' ' . $request->input('last_name'));
        $people->name          = $nome;
        $people->email         = $request->input('email');
        $people->phone        = $request->input('phone_full');
        $people->birth_at      = $request->input('birth_at');
        $people->address       = $request->input('address');
        $people->city          = $request->input('city-dd');
        $people->state          = $request->input('state-dd');
        $people->cep           = $request->input('cep');
        $people->country       = $request->input('country-dd');
        $people->role       = $request->input('role');
        $people->status_id = '14'; //ativo
        $people->is_visitor       = $request->input('is_visitor');
        $people->is_transferred       = $request->input('is_transferred');
        $people->is_responsible       = $request->input('is_responsible');
        $people->is_conversion       = $request->input('is_conversion');
        $people->is_baptism       = $request->input('is_baptism');
        $people->is_verify       = 'true';
        $people->sex       = $request->input('sex');
        //$people->note       = $request->input('note');
        $people->is_newvisitor = 'false';
        $people->lat = $request->input('lat-span');
        $people->lng = $request->input('lon-span');
        //pegar tenant
        $this->get_tenant();

        //consultar e-mail duplicado
        $validaremail = People::where('email', $people->email)->get();
        if ($validaremail->count() >= 1) {
            $request->session()->flash("info", 'Email duplicado.');
            return redirect()->back();
        } else
            $people->save();
        //adicionar auditoria
        People_Aud::create([
            'id' => $people->id,
            'name' => $people->name,
            'email' => $people->email,
            'phone' => $people->phone,
            'birth_at' => $people->birth_at,
            'address' => $people->address,
            'city' => $people->city,
            'state' => $people->state,
            'cep' => $people->cep,
            'country' => $people->country,
            'role' => $people->role,
            'status_id' => $people->status_id,
            'is_visitor' => $people->is_visitor,
            'is_transferred' => $people->is_transferred,
            'is_responsible' => $people->is_responsible,
            'is_conversion' => $people->is_conversion,
            'is_baptism' => $people->is_baptism,
            'is_verify' => $people->is_verify,
            'sex' => $people->sex,
            'is_newvisitor' => $people->is_newvisitor,
            'lat' => $people->lat,
            'lng' => $people->lng,
        ]);
        //adicionar o comentario se tiver
        if ($request->input('note') == !null) {
            People_Notes::create([
                'people_id' => $people->id,
                'notes' => $request->input('note'),
                'user_id' => auth()->user()->id
            ]);
        }
        //consulta usuario para criar um novo usuario e vincular a conta
        $validaruser = User::where('email', $people->email)->get();
        //flag de criar a conta
        $criaracesso = $request->has('criar_acesso') ? 1 : 0;
        //criar a conta
        if ($criaracesso == true) {
            //se o email nao estiver sido cadastro
            if ($validaruser->first() == null) {
                //gerar hash
                $pwa = Str::random(8);
                //criar o usuario
                $user =  User::create([
                    'name' => $people->name,
                    'email' => $people->email,
                    'password' => Hash::make($pwa), //gerar senha
                    'country' =>  $people->country,
                    'phone' => $people->phone
                ]);
                //associar ao user
                $user->assignRole('user');

                //adicionar log
                $this->adicionar_log_global('14', 'C', $user);

                //validar email agora cadastrado
                $validaruser = User::where('email', $people->email)->get();
                //associar usuário a pessoa na conta local
                $associar = People::where('email', $people->email)->first();
                $associar->user_id = $validaruser->first()->id;
                $associar->save();

                //criar vinculo com a conta
                $this->criar($validaruser->first()->id, session()->get('key'), $people->id);
                //disparar o email
                $conta_name = session()->get('conta_name');
                Mail::to($people->email)->send(new SendMailBemVindo($conta_name, $user->email, $pwa));

                $request->session()->flash("success", __('general.people') . __('action.creat'));
                return redirect()->back();
            } else {
                //associar ao usuario com o email ja cadastrado
                $associar = People::where('email', $people->email)->first();
                $associar->user_id = $validaruser->first()->id;
                $associar->save();

                //disparar email
                $conta_name = session()->get('conta_name');
                Mail::to($people->email)->queue(new SendMailLiberar($conta_name));

                //criar vinculo com a conta
                $this->criar($validaruser->first()->id, session()->get('key'), $people->id);
                $request->session()->flash("success", __('general.people') . __('action.creat'));
                return redirect()->back();
            }
        } else {
            //se estiver desmarcado o criar conta, apenas adiciona a pessoa
            $request->session()->flash("success", __('general.people') . __('action.creat'));
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //pegar tenant
        $this->get_tenant();
        //buscar pessoa
        $people = People::with('acesso')->find($id);
        //validar o id se existe ou se é admin
        if ($people == null or $people->is_admin == true or $people->deleted_at == !null) {
            session()->flash("danger",  __('action.error'));
            return redirect()->route('people.index');
        }
        //campo obrigatoria
        $campo = Config_system::find('1')->first();
        //status
        $statuses = Status::all()->where("type", 'people');
        //roles 
        $roles = Roles::all();
        //anotacoes
        $notes = People_Notes::all()->where("people_id", $id);
        //carregar localização
        $locations = Institution::find(session()->get('key'));
        //se tiver vazio, retornar para validar, mas vai carregar a tela de criação de pessoa
        if ($campo->geolocation == true) {
            if ($locations->lng == null or $locations->lat == null) {
                session()->flash("info", "Necessário informar a localização na conta para exibição correta do mapa");
            }
        }
        //localidade normal
        $countries = Country::all();
        $state = State::where('country_id', $people->country)->get();
        $city = City::where('state_id', $people->state)->get();

        return view('people.EditForm', compact('locations'), ['statuses' => $statuses, 'people' => $people, 'roles' => $roles, 'countries' => $countries, 'state' => $state, 'city' => $city, 'notes' => $notes]);
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
            'name'             => 'required|min:1|max:255',
            'status_id'         => 'required',
        ]);
        //pegar tenant
        $this->get_tenant();
        $pessoa = People::find($id);
        $people = People::find($id);
        $people->name          = strtoupper($request->input('name'));
        $people->email         = $request->input('email');
        $people->phone        = $request->input('phone_full');
        $people->birth_at      = $request->input('birth_at');
        $people->address       = $request->input('address');
        $people->city          = $request->input('city-dd');
        $people->state          = $request->input('state-dd');
        $people->cep           = $request->input('cep');
        $people->country       = $request->input('country-dd');
        $people->role       = $request->input('role');
        $people->status_id = $request->input('status_id');
        $people->is_verify       = 'true';
        $people->is_visitor       = $request->has('is_visitor') ? 1 : 0;
        $people->is_transferred       = $request->has('is_transferred') ? 1 : 0;
        $people->is_responsible       = $request->has('is_responsible') ? 1 : 0;
        $people->is_conversion       = $request->has('is_conversion') ? 1 : 0;
        $people->is_baptism       = $request->has('is_baptism') ? 1 : 0;
        $people->sex       = $request->input('sex');
        //$people->note       = $request->input('note');
        $people->is_newvisitor = 'false';
        //se tiver os valores do google maps 
        if (($request->input('lat-span') and $request->input('lon-span')) == !null) {
            $people->lat = $request->input('lat-span');
            $people->lng = $request->input('lon-span');
        }
        //consultar e-mail duplicado
        $validaremail = People::where('email', $people->email)->get();
        if ($validaremail->count() >= 1 and !($people->email == $pessoa->email)) {
            $request->session()->flash("info", 'Email duplicado.');
            return redirect()->back();
        }
        $people->save();

        //adicionar auditoria
        People_Aud::create([
            'id' => $id,
            'name' => $people->name,
            'email' => $people->email,
            'phone' => $people->phone,
            'birth_at' => $people->birth_at,
            'address' => $people->address,
            'city' => $people->city,
            'state' => $people->state,
            'cep' => $people->cep,
            'country' => $people->country,
            'role' => $people->role,
            'status_id' => $people->status_id,
            'is_visitor' => $people->is_visitor,
            'is_transferred' => $people->is_transferred,
            'is_responsible' => $people->is_responsible,
            'is_conversion' => $people->is_conversion,
            'is_baptism' => $people->is_baptism,
            'is_verify' => $people->is_verify,
            'sex' => $people->sex,
            'is_newvisitor' => $people->is_newvisitor,
            'lat' => $people->lat,
            'lng' => $people->lng,
        ]);
        //adicionar o comentario se tiver
        if ($request->input('note') == !null) {
            People_Notes::create([
                'people_id' => $people->id,
                'notes' => $request->input('note'),
                'user_id' => auth()->user()->id
            ]);
        }

        //consulta antes para criar o acesso a conta
        $validaruser = User::where('email', $people->email)->get();
        //flag de criar o acesso
        $criaracesso = $request->has('criar_acesso') ? 1 : 0;
        //criar a conta
        if ($criaracesso == true) {
            //se usuario for novo
            if ($validaruser->first() == null) {
                //gerar hash
                $pwa = Str::random(8);
                //criar o usuario
                $user =  User::create([
                    'name' => $people->name,
                    'email' => $people->email,
                    'password' => Hash::make($pwa), //gerar senha
                    'country' =>  $people->country,
                    'phone' => $people->phone
                ]);
                //associar ao user
                $user->assignRole('user');
                //logs
                $this->adicionar_log_global('14', 'C', $user);
                //validar email
                $validaruser = User::where('email', $people->email)->get();
                //associar usuario a pessoa na conta
                $associar = People::where('email', $people->email)->first();
                $associar->user_id = $validaruser->first()->id;
                $associar->save();
                //criar o vinculo a conta
                $this->criar($validaruser->first()->id, session()->get('key'), $people->id);
                //disparar o email
                $conta_name = session()->get('conta_name');
                Mail::to($people->email)->send(new SendMailBemVindo($conta_name, $user->email, $pwa));

                $request->session()->flash("success", __('general.people') . __('action.edit'));
                return redirect()->route('people.index');
            } else {
                //se tiver o usuario
                $associar = People::where('email', $people->email)->first();
                //associar ao usuario validando o email
                $associar->user_id = $validaruser->first()->id;
                $associar->save();
                //disparar o email
                $conta_name = session()->get('conta_name');
                Mail::to($people->email)->queue(new SendMailLiberar($conta_name));
                //criar vinculo com a conta
                $this->criar($validaruser->first()->id, session()->get('key'), $people->id);
                $request->session()->flash("success", __('general.people') . __('action.edit'));
                return redirect()->route('people.index');
            }
        } else {
            //se estiver desmarcado o criar conta, apenas atualizar a pessoa
            $request->session()->flash("success", __('general.people') . __('action.edit'));
            return redirect()->route('people.index');
        }
    }
    public function show($id)
    {
        //consulta
        $people = new People();
        $people->setConnection('tenant');
        $people = $people::with('acesso')->find($id);

        //localidade normal
        $countries = Country::all();
        $state = State::where('country_id', $people->country)->get();
        $city = City::where('state_id', $people->state)->get();

        return view('people.view', [
            'people' => $people,
            'countries' => $countries,
            'state' => $state,
            'city' => $city
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $user_id)
    {
        //pegar tenant
        $this->get_tenant();
        //validar vinculo com os grupos
        $validargrupo = People_Groups::where('user_id', $id);
        //se tiver, primeiro precisa remover os vinculos
        if ($validargrupo->count() >= 1) {
            session()->flash("info",  __('action.error_people_group'));
            return redirect()->back();
        }
        //caso esteja sem vinculo com os grupos
        if ($validargrupo->count() == 0) {
            //deletar pessoa
            $people = people::find($id);
            if ($people) {
                $people->delete();
                //adicionar log
                $this->adicionar_log('1', 'D', $people);
            }
            //deletar o acesso
            if ($user_id != 0) {
                ///consultar o vinculo da pessoa
                $validaracesso = Users_Account::where('user_id', $user_id)->where('account_id', session()->get('key'));
                $validaracesso->delete();
                //adicionar log
                $this->adicionar_log_global('11', 'D', '{"people_id":"' . $id . '","account_id":"' . session()->get('key') . '","user_id":"' . $user_id . '"}');
                //disparar o email
                $conta_name = session()->get('conta_name');
                Mail::to($people->email)->queue(new SendMailCancelar($conta_name));
            }
            session()->flash("warning", __('general.people') . __('action.delete'));
            return redirect()->route('people.index');
        }
    }

    public function searchHistoric(Request $request, People $people)
    {
        //pegar tenant
        $this->get_tenant();
        //user data
        $you = auth()->user();
        //permissao
        $roles = People::where('user_id', $you->id)->with('roleslocal')->first();
        $dataForm = $request->except('_token');
        //carregar status
        $statuses = Status::all()->where("type", 'people');
        //carregar pesquisa
        $peoples =  $people->search($dataForm, $this->totalPagesPaginate);

        return view('people.index', compact('peoples', 'dataForm', 'roles', 'statuses'));
    }

    public function criar($user_id, $accout_id, $people_id): array
    {
        FacadesDB::beginTransaction();
        //criar vinculo com a conta
        $useraccount = new Users_Account();
        $useraccount->user_id = $user_id;
        $useraccount->account_id = $accout_id;
        $useraccount->people_id = $people_id;
        $useraccount->save();

        if ($useraccount) {
            //adicionar log
            $this->adicionar_log_global('11', 'C', $useraccount);
            FacadesDB::commit();
            //auditoria do vinculo com a conta
            Users_Account_Aud::create([
                'id' =>  $useraccount->id,
                'user_id' => $user_id,
                'account_id' => $accout_id,
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
