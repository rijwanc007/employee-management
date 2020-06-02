<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TimeReportPolicy
{
    use HandlesAuthorization;
    public function timeReportIndex(User $user){
        return $this->getThePermission($user,43);
    }
    public function allTimeReportIndex(User $user){
        return $this->getThePermission($user,44);
    }
    public function getThePermission($user,$p_id){
        foreach($user->roles as $role){
            foreach($role->permissions as $permission){
                if($permission->id == $p_id){
                    return true;
                }
            }
        }
        return false;
    }
}
