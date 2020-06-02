<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
       'user_id','document'
    ];
    protected $table = 'documents';
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
