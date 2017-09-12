<?php

namespace Dservices\Http\Controllers\admin;

use Illuminate\Http\Request;
use Dservices\Http\Controllers\Controller;
use Dservices\Model\contratistas;
use Dservices\Model\servicioscontratistas;



class serviciosContratistasController extends Controller
{
    public function index()
    {
        $servicioscontratistas=servicioscontratistas::select('servicioscontratistas.*','contratistas.nombre as contratista')
        ->join('contratistas','servicioscontratistas.contratistas_id','contratistas.id')
        ->get();
        return view('admin.serviciosContratistasNewView')
        ->with('servicioscontratistas',$servicioscontratistas);

    }

    public function create()
    {
        return view('admin.serviciosContratistasNewView');   
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'=>'required|min:3',
            'descripcion'=>'required|min:3',
            'tarifaparticular'=>'required|not_in:0',
            'ingresoconvenio'=>'required|not_in:0',
            'contratistas_id'=>'required|not_in:0',
            ]);

        servicioscontratistas::create($request->all());
        return redirect()->route('servicioscontratistas.index');
    }

    public function show($id)
    {
        $servicioscontratistas=servicioscontratistas::select('servicioscontratistas.*','contratistas.nombre as contratista')
        ->join('contratistas','servicioscontratistas.contratistas_id','contratistas.id')
        ->where('servicioscontratistas.id',$id)
        ->first();

        return view('admin.serviciosContratistasView')
        ->with('servicioscontratistas',$servicioscontratistas);        
    }


    public function edit($id)
    {
        $servicioscontratistas=servicioscontratistas::select('servicioscontratistas.*','contratistas.nombre as contratista')
        ->join('contratistas','servicioscontratistas.contratistas_id','contratistas.id')
        ->where('servicioscontratistas.id',$id)
        ->first();
        
        return view('admin.serviciosContratistasEditView')
        ->with('servicioscontratistas',$servicioscontratistas);        

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
        $servicioscontratistas=servicioscontratistas::FindOrFail($id);
        $servicioscontratistas->fill($request->all())->save();
        return redirect()->route('servicioscontratistas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicioscontratistas=servicioscontratistas::FindOrFail($id);
        $servicioscontratistas->delete();
        return redirect()->route('servicioscontratistas.index');
    }
    
     public function autocompletar(Request $request){       
        $term = $request->input('term');
        $sedes_id = $request->input('sedes_id');
        $tiposervicios_id = $request->input('tiposervicios_id');
        $results = array();
        
        $queries=servicioscontratistas::select('servicioscontratistas.id','servicioscontratistas.nombre','servicioscontratistas.descripcion','servicioscontratistas.tarifaparticular','contratistas.nombre as contratista')
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
        
       foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => "<a href='#'>'".$query->nombre."</a>" ];
        }
        return $queries;
    }
}
