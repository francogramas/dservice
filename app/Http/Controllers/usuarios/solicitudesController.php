<?php

namespace Dservices\Http\Controllers\usuarios;

use Illuminate\Http\Request;
use Dservices\Http\Controllers\Controller;
use Dservices\Model\contratistas;
use Dservices\Model\servicioscontratistas;
use Dservices\Model\solicitudes;
use Session;
use Auth;
class solicitudesController extends Controller
{
    public function index()
    {
        return view('usuarios.solicitudesView');
    }

    public function create()
    {
    }
    public function store(Request $request)
    {
        $request{'users_id'}=Auth::user()->id;
        solicitudes::create($request->all());
        return redirect('/');
    }

    public function show($id)
    {
        $servicioscontratistas=servicioscontratistas::select('servicioscontratistas.*','contratistas.nombre as contratista')
        ->join('contratistas','servicioscontratistas.contratistas_id','contratistas.id')
        ->where('servicioscontratistas.id',$id)  
        ->first();

        return view('usuarios.solicitudesView')
        ->with('servicioscontratistas',$servicioscontratistas);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
    public function detalle($id){
        $solicitudes=solicitudes::select('solicitudes.*','servicioscontratistas.nombre','servicioscontratistas.tarifaparticular','contratistas.nombre as contratista','contratistas.telefono','contratistas.correo','users.name as usuario','users.phone')        
        ->join('servicioscontratistas','solicitudes.servicioscontratistas_id','servicioscontratistas.id')
        ->join('contratistas','servicioscontratistas.contratistas_id','contratistas.id')
        ->join('users','solicitudes.users_id','users.id')
        ->where('solicitudes.id',$id)  
        ->first();

        return view('admin.solicitudesDetalleView')
        ->with('solicitudes',$solicitudes);   
    }
}
