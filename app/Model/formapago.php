<?php

namespace Dservices\Model;

use Illuminate\Database\Eloquent\Model;

class formapago extends Model
{
    protected $table = 'formapago';
	protected $primarykey='id';	
    protected $fillable = ['id', 'nombre'];
}
