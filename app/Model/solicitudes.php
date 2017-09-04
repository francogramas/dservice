<?php

namespace Dservices\Model;

use Illuminate\Database\Eloquent\Model;

class solicitudes extends Model
{
    protected $table = 'solicitudes';
	protected $primarykey='id';	
    protected $fillable = ['users_id','estadosolicitudes_id','servicioscontratistas_id','fecha','hora'];
}
