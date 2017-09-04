<?php

namespace Dservices\Http\Controllers\admin;

use Illuminate\Http\Request;
use Dservices\Http\Controllers\Controller;
use Dservices\Model\contratistas;
use Dservices\Model\servicioscontratistas;
use Dservices\Model\solicitudes;
use Dservices\Model\estadosolicitudes;
use Dservices\User;


use Session;

class solicitudesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $solicitudes=solicitudes::select('solicitudes.*','users.name','servicioscontratistas.nombre as servicio','contratistas.nombre as contratista', 'estadosolicitudes.nombre as estado','ciudades.name as ciudad')
        ->join('users','solicitudes.users_id','users.id')
        ->join('servicioscontratistas','solicitudes.servicioscontratistas_id','servicioscontratistas.id')
        ->join('estadosolicitudes','solicitudes.estadosolicitudes_id','estadosolicitudes.id')
        ->join('contratistas','servicioscontratistas.contratistas_id','contratistas.id')
        ->join('sedes','contratistas.sedes_id','sedes.id')
        ->join('ciudades','sedes.ciudades_id','ciudades.id')
        ->whereIn('solicitudes.estadosolicitudes_id',['1','2'])
        ->get();

        return view('admin/solicitudesView')
        ->with('solicitudes',$solicitudes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
