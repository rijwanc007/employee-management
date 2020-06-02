<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HrPolicy
{
    use HandlesAuthorization;
    public function hrIndex(User $user){
        return $this->getThePermission($user,8);
    }
    public function hrCreate(User $user){
        return $this->getThePermission($user,9);
    }
    public function show(User $user){
        return $this->getThePermission($user,10);
    }
    public function edit(User $user){
        return $this->getThePermission($user,11);
    }
    public function delete(User $user){
        return $this->getThePermission($user,12);
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
