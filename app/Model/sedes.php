<?php

namespace Dservices\Model;

use Illuminate\Database\Eloquent\Model;

class sedes extends Model
{
	protected $table = 'sedes';
	protected $primarykey='id';	
    protected $fillable = ['id','ciudades_id','direccion','telefonos','celulares','email'];   
}