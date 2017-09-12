<?php

namespace Dservices\Model;

use Illuminate\Database\Eloquent\Model;

class sedesusers extends Model
{
	// Esta tabla solo almacena los datos de usuarios por sede para los usuarios con roles administrativos.
    protected $table = 'sedesusers';
	protected $primarykey='id';	
    protected $fillable = ['id','users_id','sedes_id'];
}
