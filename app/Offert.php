<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offert extends Model
{
    protected $fillable = [
      'em_id','em_name','department','date','sent_offert','waiting_for_clients_feedback','offert_value','to_close_deals'
    ];
    protected $table = 'offerts';
}
