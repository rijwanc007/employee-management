<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SellerPolicy
{
    use HandlesAuthorization;
    public function sellerIndex(User $user){
        return $this->getThePermission($user,33);
    }
    public function sellerCreate(User $user){
        return $this->getThePermission($user,34);
    }
    public function show(User $user){
        return $this->getThePermission($user,35);
    }
    public function edit(User $user){
        return $this->getThePermission($user,36);
    }
    public function delete(User $user){
        return $this->getThePermission($user,37);
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
