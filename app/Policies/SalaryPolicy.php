<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SalaryPolicy
{
    use HandlesAuthorization;
    public function salaryIndex(User $user){
        return $this->getThePermission($user,46);
    }
    public function salaryCreate(User $user){
        return $this->getThePermission($user,47);
    }
    public function show(User $user){
        return $this->getThePermission($user,48);
    }
    public function edit(User $user){
        return $this->getThePermission($user,49);
    }
    public function delete(User $user){
        return $this->getThePermission($user,50);
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
