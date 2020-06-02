<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{
   protected $fillable =[
      'user_id','relative_name','relative_phone','relation'
   ];
   protected $table = 'relatives';
   public function user(){
       return $this->belongsTo(User::class,'user_id');
   }
}
