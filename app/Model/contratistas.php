<?php

namespace Dservices\Model;

use Illuminate\Database\Eloquent\Model;

class contratistas extends Model
{
    protected $table='contratistas';
	protected $primarykey='id';	
	protected $fillable=['id','sedes_id','tiposervicios_id','codigo','nombre','descripcion','ciudades_id','direccion','telefono','correo','web'];
}
