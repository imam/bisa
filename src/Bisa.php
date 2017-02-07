<?php

namespace Bisa;

use App\User;

class Bisa{

    public $role_collection;

    public $user_model;

    public function __construct()
    {
        $this->role_collection = new RoleCollection();
        $this->user_model = User::class;
        $this->user_role_attribute = config('user_role_attribute','role');
    }

    /**
     * Check if current authenticated user or specified user pass the authorization
     *
     * @param $permission
     * @param \App\User $user
     * @return string
     */
    public function can($permission, $user = null)
    {
        if(!$user){
            $user = \Auth::user();
        }
        try{
            return isset($this->role_collection->roles[$user->{$this->user_role_attribute}]->permissions[$permission]);
        }catch (\Exception $e){
            return false;
        }
    }
}