<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DashboardPolicy
{
    use HandlesAuthorization;
    public function adminDashboard(User $user){
        return $this->getThePermission($user,1);
    }
    public function userDashboard(User $user){
        return $this->getThePermission($user,2);
    }
    public function attendances(User $user){
        return $this->getThePermission($user,3);
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
