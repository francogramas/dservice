<?php

namespace Dservices\Http\Controllers;

use Illuminate\Http\Request;
use Dservices\Model\sedes;

class wellcomeController extends Controller
{
    public function index(){
		$sede=sedes::count();
		$sedes=sedes::first();		
		if ($sede>1){
			return redirect()->route('ususedes.index');
		}
		else{
			return redirect()->route('ususedes.show',$sedes->id);			
		}	
    }
}
