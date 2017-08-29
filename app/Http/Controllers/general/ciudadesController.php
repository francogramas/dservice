<?php

namespace Dservices\Http\Controllers\general;
use Illuminate\Http\Request;

use Dservices\Http\Requests;
use Dservices\Http\Controllers\Controller;
use Dservices\Model\ciudades;

class ciudadesController extends Controller
{
      public function getCiudades (Request $request, $id)
    {
        if ($request->ajax()){
            $ciudades=ciudades::ciudades($id);
            return response()->json($ciudades);
        }
    }
}
