<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $fillable = [
      'user_id','active_service','service_start','service_end','prospect_service'
    ];
    protected $table = 'services';
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
