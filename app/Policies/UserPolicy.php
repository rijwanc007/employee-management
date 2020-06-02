<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    public function allUser(User $user){
        return $this->getThePermission($user,4);
    }
    public function show(User $user){
        return $this->getThePermission($user,5);
    }
    public function edit(User $user){
        return $this->getThePermission($user,6);
    }
    public function delete(User $user){
        return $this->getThePermission($user,7);
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
