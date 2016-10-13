<?php

namespace Helori\LaravelPermission;

use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    public function register()
    {
        
    }
    
    public function boot()
	{
		if(!class_exists('CreatePermissionTables'))
        {
            $timestamp = date('Y_m_d_His', time());
            $this->publishes([
                __DIR__.'/migrations/create_permission_tables.php' => database_path('migrations/'.$timestamp.'_create_permission_tables.php'),
            ], 'migrations');
        }
	}
}
