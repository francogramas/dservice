<?php

namespace Dservices\Http\Controllers\usuarios;

use Illuminate\Http\Request;
use Dservices\Http\Controllers\Controller;
use Dservices\Model\sedes;
use Dservices\Model\ciudades;
use Dservices\Model\tiposervicios;

class sedesController extends Controller
{
    public function index(){
    	
    	$sedes=sedes::select('sedes.*','ciudades.name')
		->join('ciudades','sedes.ciudades_id','ciudades.id')
		->get();

    	return view('usuarios.sedesView')
    	->with('sedes',$sedes);
    }

    public function show($id){
		$tiposervicios=tiposervicios::all();    	
    	return view('welcome')
    	->with('tiposervicios',$tiposervicios);
    }
}
