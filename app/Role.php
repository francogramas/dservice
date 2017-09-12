<?php

namespace Dservices;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    protected $table = 'role';
	protected $primarykey='id';	
    protected $fillable = ['id', 'name'];

    public function users()
    {
        return $this->hasMany('Dservices\User', 'role_id', 'id');
    }

}
