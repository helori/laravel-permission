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

Publish and run the migrations:
```bash
php artisan vendor:publish --provider="Helori\LaravelAdmin\PermissionServiceProvider" --tag="migrations"
php artisan migrate
```