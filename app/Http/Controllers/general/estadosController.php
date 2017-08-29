<?php

namespace Dservices\Http\Controllers\general;
use Illuminate\Http\Request;

use Dservices\Http\Requests;
use Dservices\Http\Controllers\Controller;
use Dservices\Model\estados;

class estadosController extends Controller
{
    public function getEstados(Request $request, $id)
    {
        if ($request->ajax()){
            $estados=estados::estados($id);
            return response()->json($estados);
        }
    }
}
