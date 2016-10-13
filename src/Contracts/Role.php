<?php

namespace Helori\LaravelPermission\Contracts;


interface Role
{
    public function permissions();
    
    public function users();

    public function hasPermission($permission_name);
}
