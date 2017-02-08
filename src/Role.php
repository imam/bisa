<?php

namespace Imam\Bisa;

class Role{

    /** @var  RoleModel */
    protected $role;

    /** @var RoleCollection */
    protected $role_collection;

    public function __construct()
    {
        $this->role_collection = app('bisa')->role_collection;
    }

    /**
     * Make a new role model. Slug must be unique
     *
     * @param $slug
     * @return $this
     * @throws BisaException
     */
    public function create($slug){
        try{
            if(isset($this->role_collection->roles[$slug])){
                throw new \Exception;
            }
        }catch(\Exception $e){
            throw new BisaException(
                "Slug $slug is already registered (In {$e->getTrace()[2]['file']} line {$e->getTrace()[2]['line']})");
        }
        $this->role = new RoleModel();
        $this->role->slug = $slug;
        $this->role_collection->roles[$slug] = $this->role;
        return $this;
    }

    /**
     * Attaching permissions
     * @param array ...$permissions
     * @return $this
     */
    public function permissions(...$permissions)
    {
        foreach ($permissions as $permission_slug){
            $this->role->permissions[$permission_slug] = new PermissionModel($permission_slug);
        }
        return $this;
    }
}