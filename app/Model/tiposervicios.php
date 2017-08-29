<?php

namespace Dservices\Model;

use Illuminate\Database\Eloquent\Model;

class tiposervicios extends Model
{
    protected $table = 'tiposervicios';
	protected $primarykey='id';	
    protected $fillable = ['id', 'nombre'];
}
