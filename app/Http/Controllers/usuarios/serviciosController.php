<?php

namespace Dservices\Http\Controllers\usuarios;

use Illuminate\Http\Request;
use Dservices\Http\Controllers\Controller;
use Dservices\Model\tiposervicios;
use Dservices\Model\servicioscontratistas;
use Dservices\Model\contratistas;
use Session;

class serviciosController extends Controller
{
    public function index(){
    	
    	return view('usuarios.serviciosView');
    }

    public function show($id){
        Session(['tiposervicios_id'=>$id]);

    	$servicioscontratistas=servicioscontratistas::select('servicioscontratistas.*','contratistas.nombre as contratista')
    	->join('contratistas','servicioscontratistas.contratistas_id','contratistas.id')
    	->where('contratistas.tiposervicios_id',$id)    	
    	->where('contratistas.sedes_id',Session('sedes_id'))
    	->get();
    	return view('usuarios.serviciosView')
    	->with('servicioscontratistas',$servicioscontratistas);    	
    }

    public function autocompletar(Request $request){
                
        $term = $request->input('term');
        $sedes_id = $request->input('sedes_id');
        $tiposervicios_id = $request->input('tiposervicios_id');
        $results = array();
        
        $queries=servicioscontratistas::select('servicioscontratistas.id','servicioscontratistas.nombre','servicioscontratistas.tarifaparticular','contratistas.nombre as contratista')
        ->join('contratistas','servicioscontratistas.contratistas_id','contratistas.id')
    	->where('contratistas.tiposervicios_id',Session('tiposervicios_id'))    	
    	->where('contratistas.sedes_id',Session('sedes_id'))
    	->Where(function($query) use($term)
			{
			$query->where('servicioscontratistas.nombre','LIKE','%'.$term.'%')
			->orWhere('servicioscontratistas.descripcion','LIKE','%'.$term.'%');
		})
    	->take(20)
        ->get();
        
       /* foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => "<a href='#'>'".$query->nombre."</a>" ];
        }
        return $queries;*/

        return view('usuarios.serviciosTablaView')
        ->with('servicioscontratistas',$queries);

    }
}
