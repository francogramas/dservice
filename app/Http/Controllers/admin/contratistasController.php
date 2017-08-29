<?php

namespace Dservices\Http\Controllers\admin;

use Illuminate\Http\Request;
use Dservices\Http\Controllers\Controller;
use Dservices\Http\Requests\updateContratistasRequest;
use Dservices\Model\sedes;
use Dservices\Model\estados;
use Dservices\Model\ciudades;
use Dservices\Model\contratistas;
use Dservices\Model\tiposervicios;

class contratistasController extends Controller
{
    public function index()
    {
        $estados=estados::where('pais','47')->get();
        $ciudades=ciudades::where('estados',$estados[0]{'id'})->pluck('name','id');
        $estados=$estados->pluck('name','id');
        $tiposervicios=tiposervicios::pluck('nombre','id');

        $sedes=sedes::select('sedes.*','ciudades.name as ciudad')
        ->join('ciudades','sedes.ciudades_id','ciudades.id')
        ->pluck('ciudad','id');

        $contratistas=contratistas::select('contratistas.*','ciudades.name as ciudad')
        ->join('ciudades','contratistas.ciudades_id','ciudades.id')
        ->get();

        return view('admin.contratistasNewView')
        ->with('sedes',$sedes)
        ->with('estados',$estados)
        ->with('ciudades',$ciudades)
        ->with('contratistas',$contratistas)
        ->with('tiposervicios',$tiposervicios);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
         $this->validate($request, [
            'codigo'=>'required|min:3|unique:contratistas',
            'nombre'=>'required|min:3',
            'ciudades_id'=>'required|not_in:0',
            'telefono'=>'required|not_in:0',
            'correo'=>'required|not_in:0',
            ]);

        contratistas::create($request->all());
        return redirect()->route('contratistas.index');
    }

    public function show($id)
    {
        $contratistas=contratistas::select('contratistas.*','ciudades.name as ciudad','ciudades.estados')
        ->join('ciudades','contratistas.ciudades_id','ciudades.id')
        ->where('contratistas.id',$id)
        ->first();

        $estados=estados::where('pais','47')->get();
        $ciudades=ciudades::where('estados',$contratistas->estados)->pluck('name','id');
        $estados=$estados->pluck('name','id');
        $tiposervicios=tiposervicios::pluck('nombre','id');

        $sedes=sedes::select('sedes.*','ciudades.name as ciudad')
        ->join('ciudades','sedes.ciudades_id','ciudades.id')
        ->pluck('ciudad','id');

        return view('admin.contratistasView')
        ->with('sedes',$sedes)
        ->with('estados',$estados)
        ->with('ciudades',$ciudades)
        ->with('contratistas',$contratistas)
        ->with('tiposervicios',$tiposervicios);
    }

    public function edit($id)
    {        

        $contratistas=contratistas::select('contratistas.*','ciudades.name as ciudad','ciudades.estados')
        ->join('ciudades','contratistas.ciudades_id','ciudades.id')
        ->where('contratistas.id',$id)
        ->first();

        $estados=estados::where('pais','47')->get();
        $ciudades=ciudades::where('estados',$contratistas->estados)->pluck('name','id');
        $estados=$estados->pluck('name','id');
        $tiposervicios=tiposervicios::pluck('nombre','id');

        $sedes=sedes::select('sedes.*','ciudades.name as ciudad')
        ->join('ciudades','sedes.ciudades_id','ciudades.id')
        ->pluck('ciudad','id');

        return view('admin.contratistasEditView')
        ->with('sedes',$sedes)
        ->with('estados',$estados)
        ->with('ciudades',$ciudades)
        ->with('contratistas',$contratistas)
        ->with('tiposervicios',$tiposervicios);
    }

    public function update(Request $request, $id)
    {
        $contratistas=contratistas::FindOrFail($id);
        $contratistas->fill($request->all())->save();
        return redirect()->route('contratistas.index');
    }

    public function destroy($id)
    {
        $contratistas=contratistas::FindOrFail($id);
        $contratistas->delete();
        return redirect()->route('contratistas.index');

    }

    public function autocompletar(Request $request){
                
        $term = $request->input('term');
        $sedes_id = $request->input('sedes_id');
        $results = array();
        
        $queries=contratistas::where('nombre','LIKE','%'.$term.'%')
        ->orWhere('codigo','LIKE','%'.$term.'%')
        ->take(20)
        ->get();
        
        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->codigo.' || '.$query->nombre];
        }
        return Response()->json($results);
    }
}