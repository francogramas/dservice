<?php

namespace Dservices\Model;

use Illuminate\Database\Eloquent\Model;

class servicioscontratistas extends Model
{
    protected $table = 'servicioscontratistas';
	protected $primarykey='id';	
    protected $fillable = ['nombre','descripcion','tarifaparticular','ingresoconvenio','contratistas_id'];
}
