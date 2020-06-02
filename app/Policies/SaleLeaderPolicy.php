<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SaleLeaderPolicy
{
    use HandlesAuthorization;
    public function saleLeaderIndex(User $user){
        return $this->getThePermission($user,23);
    }
    public function saleLeaderCreate(User $user){
        return $this->getThePermission($user,24);
    }
    public function show(User $user){
        return $this->getThePermission($user,25);
    }
    public function edit(User $user){
        return $this->getThePermission($user,26);
    }
    public function delete(User $user){
        return $this->getThePermission($user,27);
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
