<?php

namespace Helori\LaravelPermission\Traits;

use Helori\LaravelPermission\Models\Role;
use Helori\LaravelPermission\Models\Permission;


trait HasRoles
{
    use HasPermissions;
    
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role_name)
    {
        return $this->roles->contains('name', $role_name);
    }

    public function setRole($role_name)
    {
        $role = Role::where('name', $role_name)->first();
        if($role){
            $this->roles()->save($role);
        }
        return $this;
    }
    
    public function removeRole($role_name)
    {
        $role = Role::where('name', $role_name)->first();
        if($role){
            $this->roles()->detach($role);
        }
        return $this;
    }
    
    protected function hasPermissionViaRole($permission_name)
    {
        $permission = Permission::where('name', $permission_name)->first();
        if($permission){
            foreach($permission->roles as $role){
                if($this->hasRole($role->name)){
                    return true;
                }
            }
        }
        return false;
    }
}