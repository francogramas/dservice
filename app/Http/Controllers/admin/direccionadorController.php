<?php

namespace GuiasSoft\Http\Controllers\admin;

use Illuminate\Http\Request;

use GuiasSoft\Http\Requests;
use GuiasSoft\Http\Controllers\Controller;
use GuiasSoft\User;
use Auth;


class direccionadorController extends Controller
{
 public function index(){
 	$rol=User::find(Auth::id());
 	if ($rol{'role_id'}=='8'){
 		return redirect('/');
 	}
 	elseif($rol{'role_id'}=='1'){
 		return redirect('/');
 	}
 	elseif($rol{'role_id'}=='12'){
 		return redirect('/');
 	}
 } 
}
