<?php

namespace App\Http\Controllers\Perfil;

use App\Entities\Marca;
use App\Entities\Modelo;
use App\Http\Filters\Perfil\ModelosFilter;
use App\Http\Requests\PerfilModeloSaveRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModeloController extends Controller
{

    public function index(Request $request)
    {
        $filter = new ModelosFilter($request);

        $modelos = $filter->apply()->paginate(15)->appends($request->only(['name']));

        return view('perfil.modelos.index', compact('modelos'));
    }

    public function form($id = null)
    {
        $modelo = null;
        $action = route('perfil.modelo.create');

        if ($id) {
            $modelo = Modelo::find($id);
            $action = route('perfil.modelo.update', ['id' => $id]);
        }

        $marcas = Marca::all()->sortBy('name');

        return view('perfil.modelos.form', compact('modelo', 'marcas', 'action'));
    }

    public function create(PerfilModeloSaveRequest $request)
    {
        $modelo           = new Modelo();
        $modelo->name     = $request->get('name');
        $modelo->marca_id = $request->get('marca_id');
        $modelo->save();

        return redirect()->route('perfil.modelos');
    }

    public function update($id, PerfilModeloSaveRequest $request)
    {
        $modelo           = Modelo::find($id);
        $modelo->name     = $request->get('name');
        $modelo->marca_id = $request->get('marca_id');
        $modelo->save();

        return redirect()->route('perfil.modelos');
    }

}
