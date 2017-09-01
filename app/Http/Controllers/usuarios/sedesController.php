<?php

namespace Dservices\Http\Controllers\usuarios;

use Illuminate\Http\Request;
use Dservices\Http\Controllers\Controller;
use Dservices\Model\sedes;
use Dservices\Model\ciudades;
use Dservices\Model\tiposervicios;
use Dservices\Model\contratistas;
use Session;


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

        Session(['sedes_id'=>$id]);

        $tiposervicios=contratistas::select('tiposervicios.nombre','tiposervicios.id')
        ->join('tiposervicios','contratistas.tiposervicios_id','tiposervicios.id')
        ->where('contratistas.sedes_id',$id)
        ->groupBy('tiposervicios.id','tiposervicios.nombre')
        ->get();

    	return view('welcome')
    	->with('tiposervicios',$tiposervicios);
    }
}
