# laravel-permission
Define roles and permissions for Laravel users

## Installation and setup

```bash
composer require helori/laravel-permission:dev-master
```

Configure your application:
```php
// config/app.php
'providers' => [
    ...
    Helori\LaravelPermission\PermissionServiceProvider::class,
];
```

Publish and run the migrations:
```bash
php artisan vendor:publish --provider="Helori\LaravelPermission\PermissionServiceProvider" --tag="migrations"
php artisan migrate
```

In your app/Providers/AuthServiceProvider.php :
```php
use Helori\LaravelPermission\Models\Permission;
...
class AuthServiceProvider extends ServiceProvider
{
	...
	public function boot()
	{
		...
		$permissions = Permission::all();
		foreach($permissions as $permission){
		    Gate::define($permission->name, function (User $user) use($permission) {
		        return $user->hasPermission($permission);
		    });
		}
	}
}
```

## Usage example
In your blade template files :
```html
@if(Gate::forUser($user)->allows('permission-name'))
	<div>this is only for allowed users</div>
@endif
```

