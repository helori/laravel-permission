<?php

namespace Helori\LaravelPermission\Models;

use Illuminate\Database\Eloquent\Model;
use Helori\LaravelPermission\Contracts\Permission as PermissionContract;


class Permission extends Model implements PermissionContract
{
	protected $table = 'permissions';
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = true;
    protected $hidden = [];
    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function users()
    {
        return $this->belongsToMany(App\Models\User::class);
    }
}
