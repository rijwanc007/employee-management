<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;
    public function employeeIndex(User $user){
        return $this->getThePermission($user,18);
    }
    public function employeeCreate(User $user){
        return $this->getThePermission($user,19);
    }
    public function show(User $user){
        return $this->getThePermission($user,20);
    }
    public function edit(User $user){
        return $this->getThePermission($user,21);
    }
    public function delete(User $user){
        return $this->getThePermission($user,22);
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
