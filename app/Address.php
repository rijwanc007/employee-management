<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id','address_one','state','address_two','post_code','city'
    ];
    protected $table = 'addresses';
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
