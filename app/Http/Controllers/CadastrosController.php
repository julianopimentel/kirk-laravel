<?php

namespace App\Http\Controllers;

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
        $request->session()->flash('success', __('general.category') . __('action.creat'));
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
        $request->session()->flash('success', __('general.category') . __('action.update'));
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
}
