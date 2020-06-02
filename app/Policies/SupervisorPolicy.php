<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupervisorPolicy
{
    use HandlesAuthorization;
    public function supervisorIndex(User $user){
        return $this->getThePermission($user,28);
    }
    public function supervisorCreate(User $user){
        return $this->getThePermission($user,29);
    }
    public function show(User $user){
        return $this->getThePermission($user,30);
    }
    public function edit(User $user){
        return $this->getThePermission($user,31);
    }
    public function delete(User $user){
        return $this->getThePermission($user,32);
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
