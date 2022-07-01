<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Category_Sermons;
use App\Models\Roles;
use Illuminate\Http\Request;
use App\Models\Sermons;
use App\Traits\UploadTrait;

class CadastrosController extends Controller
{

    use UploadTrait;
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

    //parte da categoria
    public function showCategory()
    {
        //pegar tenant
        $this->get_tenant();
        //roles
        $roles = Roles::all();
        //consulta da sermons
        $categorys = Category_Sermons::all();
        return view('registrations.sermons.ShowCategory', ['categorys' => $categorys,  'roles' => $roles]);
    }

    public function storeCategory(Request $request)
    {
        //pegar tenant
        $this->get_tenant();
        $validatedData = $request->validate([
            'name'             => 'required',
            'body'           => 'required',
            'roles'         => 'required',
        ]);
        $note = new Category_Sermons();
        $note->name     = $request->input('name');
        $note->body   = $request->input('body');
        $note->roles   = implode(',', $request->input('roles'));
        $note->save();
        //adicionar log
        $this->adicionar_log('20', 'C', $note);
        session()->flash('success', __('general.category') . __('action.creat'));
        return redirect()->back();
    }
    public function updateCategory(Request $request, $id)
    {
        //pegar tenant
        $this->get_tenant();
        $validatedData = $request->validate([
            'name'             => 'required',
            'body'           => 'required',
            'roles'         => 'required',
        ]);
        $note = Category_Sermons::find($id);
        $note->name     = $request->input('name');
        $note->body   = $request->input('body');
        $note->roles   = implode(',', $request->input('roles'));
        $note->save();
        //adicionar log
        $this->adicionar_log('20', 'U', $note);
        session()->flash('success', __('general.category') . __('action.update'));
        return redirect()->back();
    }
    public function destroyCategory($id)
    {
        //pegar tenant
        $this->get_tenant();
        //validar se possui vinculo com video
        $validar = Sermons::where('type', $id);
        if ($validar->count() == 0) {

            $categoria = Category_Sermons::find($id);
            if ($categoria) {
                $categoria->delete();
            }
            //adicionar
            session()->flash('warning', __('general.category') . __('action.delete'));
            $this->adicionar_log('20', 'D', $categoria);
            return redirect()->back();
        }
        session()->flash("info", "Categoria possui vinculo com Estudo, favor remover");
        return redirect()->back();
    }


    //parte da categoria
    public function showContas()
    {
        //consulta da sermons
        $categorys = Balance::all();
        return view('registrations.contas.Show', ['categorys' => $categorys]);
    }

    public function storeContas(Request $request)
    {
        //pegar tenant
        $this->get_tenant();
        $validatedData = $request->validate([
            'amount'             => 'required',
            'card_name'           => 'required',
            'habilitar_financeiro'         => 'required',
        ]);
        $conta = new Balance();
        $conta->amount   = $request->input('amount');
        $conta->card_number     = $request->input('card_number');
        $conta->card_name   = $request->input('card_name');
        $conta->expire_date   = $request->input('expire_date');
        $conta->habilitar_financeiro   = $request->input('habilitar_financeiro');
        $conta->habilitar_qrcode   = $request->input('habilitar_qrcode');
        $conta->qr_code   = $request->input('qr_code');
        $conta->card_type   = $request->input('card_type');
        $conta->banco   = $request->input('banco');
        $conta->agencia   = $request->input('agencia');
        $conta->conta   = $request->input('conta');
        $conta->save();
        //adicionar log
        $this->adicionar_log('21', 'C', $conta);
        session()->flash('success', __('general.contas') . __('action.creat'));
        return redirect()->back();
    }
    public function updateContas(Request $request, $id)
    {
        $validatedData = $request->validate([
            'card_name'           => 'required',
            'habilitar_financeiro'         => 'required',
        ]);
        $conta = Balance::find($id);
        $conta->card_number     = $request->input('card_number');
        $conta->card_name   = $request->input('card_name');
        $conta->expire_date   = $request->input('expire_date');
        $conta->habilitar_financeiro   = $request->input('habilitar_financeiro');
        $conta->habilitar_qrcode   = $request->input('habilitar_qrcode');
        $conta->qr_code   = $request->input('qr_code');
        $conta->card_type   = $request->input('card_type');
        $conta->banco   = $request->input('banco');
        $conta->agencia   = $request->input('agencia');
        $conta->conta   = $request->input('conta');
        $conta->save();
        //adicionar log
        $this->adicionar_log('21', 'U', $conta);
        session()->flash('success', __('general.contas') . __('action.update'));
        return redirect()->back();
    }
    public function destroyContas($id)
    {
        $conta = Balance::find($id);
        if ($conta) {
            $conta->active = false;
            $conta->save();
        }
        //adicionar
        session()->flash('warning', __('general.contas') . __('action.delete'));
        $this->adicionar_log('21', 'D', $conta);
        return redirect()->back();
    }
}
