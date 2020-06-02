<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable=[
        'role_name','status'
    ];
    protected $table='roles';
    public function permissions(){
        return $this->belongsToMany('App\Permission');
    }
}
