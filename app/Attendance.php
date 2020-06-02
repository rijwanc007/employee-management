<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'em_id','em_name','em_email','department','date','start','lunch','end','total_hour','sick','leave','file','comment'
    ];
    protected $table = 'attendances';
}
