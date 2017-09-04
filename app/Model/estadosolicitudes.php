<?php

namespace Dservices\Model;

use Illuminate\Database\Eloquent\Model;

class estadosolicitudes extends Model
{
    protected $table = 'estadosolicitudes';
	protected $primarykey='id';	
    protected $fillable = ['id', 'nombre'];
}
