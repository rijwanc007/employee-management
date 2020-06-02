<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientPolicy
{
    use HandlesAuthorization;
    public function clientIndex(User $user){
        return $this->getThePermission($user,38);
    }
    public function clientCreate(User $user){
        return $this->getThePermission($user,39);
    }
    public function show(User $user){
        return $this->getThePermission($user,40);
    }
    public function edit(User $user){
        return $this->getThePermission($user,41);
    }
    public function delete(User $user){
        return $this->getThePermission($user,42);
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
