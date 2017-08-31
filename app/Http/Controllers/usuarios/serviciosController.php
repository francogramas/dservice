<?php

namespace Dservices\Http\Controllers\usuarios;

use Illuminate\Http\Request;
use Dservices\Http\Controllers\Controller;
use Dservices\Model\tiposervicios;
use Dservices\Model\servicioscontratistas;
use Dservices\Model\contratistas;


class serviciosController extends Controller
{
    public function index(){
    	
    	return view('usuarios.serviciosView');
    }
}
