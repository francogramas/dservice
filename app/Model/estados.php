<?php

namespace Dservices\Model;

use Illuminate\Database\Eloquent\Model;

class estados extends Model
{
    protected $table='estados';
	protected $primarykey='id';	
	protected $fillable=['id', 'name', 'pais','codigo'];


	// devuelbe la relacion del pais con el estado

	public function pais(){
		return $this -> hasmany(pais::class);
	}

	public function ciudades(){
		return $this -> belongsto(ciudades::class);
	}

	public static function estados($id)
	{
		return estados::where ('pais','=',$id)
		->get();
	}
}
