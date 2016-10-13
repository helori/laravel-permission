<?php

namespace Helori\LaravelPermission\Traits;

use Helori\LaravelPermission\Models\Permission;


trait HasPermissions
{
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission($permission)
    {
        if(is_string($permission)){
            return $this->permissions->contains('name', $permission);
        }
        else if($permission instanceof Permission) {
            return $this->permissions->contains('id', $permission->id);
        }
    }

    public function setPermission($permission)
    {
        if(is_string($permission)){
            $p = Permission::where('name', $permission)->first();   
            $this->permissions()->save($p); 
        }
        else if($permission instanceof Permission) {
            $this->permissions()->save($permission);
        }
        return $this;
    }
    
    public function removePermission($permission)
    {
        if(is_string($permission)){
            $p = Permission::where('name', $permission)->first();   
            $this->permissions()->detach($p); 
        }
        else if($permission instanceof Permission) {
            $this->permissions()->detach($permission);
        }
        return $this;
    }
}