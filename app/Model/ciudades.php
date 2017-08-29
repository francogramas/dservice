<?php

namespace Dservices\Model;

use Illuminate\Database\Eloquent\Model;

class ciudades extends Model
{
     protected $table='ciudades';
	protected $primarykey='id';	
	protected $fillable=['id', 'name', 'estados','codigo'];


	// devuelbe la relacion del pais con el estado

	public function estados(){
		return $this -> hasmany(estados::class);
	}

	public static function ciudades($id)
	{
		return ciudades::where ('estados','=',$id)
		->get();
	}
}
