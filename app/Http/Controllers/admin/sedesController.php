<?php

namespace Dservices\Http\Controllers\admin;

use Illuminate\Http\Request;
use Dservices\Http\Controllers\Controller;
use Dservices\Model\sedes;
use Dservices\Model\estados;
use Dservices\Model\ciudades;

class sedesController extends Controller
{
    public function index()
    {   
        $estados=estados::where('pais','47')->get();
        $ciudades=ciudades::where('estados',$estados[0]{'id'})->pluck('name','id');
        $estados=$estados->pluck('name','id');

        $sedes=sedes::select('sedes.*','ciudades.name as ciudad')
        ->join('ciudades','sedes.ciudades_id','ciudades.id')
        ->get();
        
        return view('admin.sedesNewView')
        ->with('sedes',$sedes)
        ->with('estados',$estados)
        ->with('ciudades',$ciudades);
    }

    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        sedes::create($request->all());
        return redirect()->route('sedes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $sedes=sedes::select('sedes.*','ciudades.estados as estados')
        ->join('ciudades','sedes.ciudades_id','ciudades.id')
        ->where('sedes.id',$id)
        ->first();

        $estados=estados::where('pais','47')->get();
        $ciudades=ciudades::where('estados',$sedes->estados)->pluck('name','id');
        $estados=$estados->pluck('name','id');
       
        //return $sedes;
        return view('admin.sedesEditView')
        ->with('sedes',$sedes)
        ->with('estados',$estados)
        ->with('ciudades',$ciudades);
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
        $sedes=sedes::FindOrFail($id);
        $sedes->fill($request->all())->save();
        return redirect()->route('sedes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sedes = sedes::FindOrFail($id);
        $sedes->delete();
        return redirect()->route('sedes.index');
    }
}