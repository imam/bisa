<?php

namespace Bisa;

class RoleCollection{

    public $roles;

    public function find_role($slug){
        foreach ($this->roles as $role){
            if($role->slug == $slug){
                return $role;
            }
        }
    }
}