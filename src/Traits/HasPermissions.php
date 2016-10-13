<?php

namespace Helori\LaravelPermission\Traits;

use Helori\LaravelPermission\Models\Permission;


trait HasPermissions
{
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission($permission_name)
    {
        return $this->permissions->contains('name', $permission_name);
    }

    public function setPermission($permission_name)
    {
        $permission = Permission::where('name', $permission_name)->first();
        if($permission){
            $this->permissions()->save($permission);
        }
        return $this;
    }
    
    public function removePermission($permission_name)
    {
        $permission = Permission::where('name', $permission_name)->first();
        if($permission){
            $this->permissions()->detach($permission);
        }
        return $this;
    }
}