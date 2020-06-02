<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        'em_id','date','department','em_name','working_hours_from','salary_for','pdf','status'
    ];
    protected $table = 'salaries';
}
