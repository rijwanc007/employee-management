<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OffertPolicy
{
    use HandlesAuthorization;
    public function offertIndex(User $user){
        return $this->getThePermission($user,52);
    }
    public function edit(User $user){
        return $this->getThePermission($user,53);
    }
    public function delete(User $user){
        return $this->getThePermission($user,54);
    }
    public function allOffert(User $user){
        return $this->getThePermission($user,55);
    }
    public function offertCreate(User $user){
        return $this->getThePermission($user,56);
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
