<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'first_name','last_name','name','image','status','account_for', 'email','private_email','invoice_email','phone','phone_evening','designation','work_space','nearest_chief','social_security_number','employee_type'
        ,'contract_start','contract_end','bank_name','account_number','clearing_number','table_tax','company_name','contact_person','organization_number','url','work_under', 'password',
    ];
    protected $table = 'users';
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function address(){
        return $this->hasOne(Address::class,'user_id');
    }
    public function relative(){
        return $this->hasOne(Relative::class,'user_id');
    }
    public function services(){
        return $this->hasOne(Services::class,'user_id');
    }
    public function document(){
        return $this->hasOne(Document::class,'user_id');
    }
    public function roles(){
        return $this->belongsToMany('App\Role');
    }
}
