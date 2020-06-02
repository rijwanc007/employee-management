<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountPolicy
{
    use HandlesAuthorization;
    public function accountIndex(User $user){
        return $this->getThePermission($user,13);
    }
    public function accountCreate(User $user){
        return $this->getThePermission($user,14);
    }
    public function show(User $user){
        return $this->getThePermission($user,15);
    }
    public function edit(User $user){
        return $this->getThePermission($user,16);
    }
    public function delete(User $user){
        return $this->getThePermission($user,17);
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
