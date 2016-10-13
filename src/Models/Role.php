<?php

namespace Helori\LaravelPermission\Models;

use Illuminate\Database\Eloquent\Model;
use Helori\LaravelPermission\Contracts\Role as RoleContract;
use Helori\LaravelPermission\Traits\HasPermissions;


class Role extends Model implements RoleContract
{
	use HasPermissions;

    protected $table = 'roles';
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = true;
    protected $hidden = [];
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(App\Models\User::class);
    }
}
