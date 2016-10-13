<?php

namespace Helori\LaravelPermission\Contracts;


interface Permission
{
    public function roles();
    
    public function users();
}
