<?php

namespace Dservices\Model;

use Illuminate\Database\Eloquent\Model;

class pais extends Model
{
    protected $table='pais';
	protected $primarykey='id';	
	protected $fillable=['id', 'sortname', 'name'];	
	
	// devuelbe la relacion de estados con los paises
	public function estados(){
		return $this -> belongsto(estados::class);
	}
}
