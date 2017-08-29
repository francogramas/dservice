<?php

namespace Dservices\Http\Controllers\admin;

use Illuminate\Http\Request;
use Dservices\Http\Controllers\Controller;
use Dservices\Model\tiposervicios;


class categoriasController extends Controller
{
    public function index(){
    	$tiposervicios=tiposervicios::all();
    	return view('admin.tipoServicioNewView')
    	->with('tiposervicios',$tiposervicios);
    }

    public function store(Request $request){
    	tiposervicios::create($request->all());
    	return redirect()->route('categorias.index');

    }
    public function show($id){
    	$tiposervicios=tiposervicios::find($id);
    	return view('admin.tipoServicioEditView')
    	->with('tiposervicios',$tiposervicios);

    }
    public function update(Request $request, $id){
    	$tiposervicios=tiposervicios::FindOrFail($id);
    	$input=$request->all();
        $tiposervicios ->fill($input)->save();
    	return redirect()->route('categorias.index');

    }

    public function destroy($id){
    	$tiposervicios = tiposervicios::FindOrFail($id);
        $tiposervicios->delete();
    	return redirect()->route('categorias.index');
        
    }
}
