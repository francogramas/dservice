<?php

namespace Dservices\Http\Controllers\admin;

use Illuminate\Http\Request;

use Dservices\Http\Requests;
use Dservices\Http\Controllers\Controller;
use Dservices\User;
use Auth;


class direccionadorController extends Controller
{
 public function index(){
 	$rol=User::find(Auth::id());
 	if ($rol{'role_id'}=='2'){
 		return redirect('/');
 	}
 	elseif($rol{'role_id'}=='1'){
 		return redirect('/');
 	}
 } 
}
