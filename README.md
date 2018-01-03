# sithu-useracl


# Install spatie/laravel-permission
  
  https://github.com/spatie/laravel-permission
  
  composer require spatie/laravel-permission
  
  php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations"
  
  php artisan migrate
  
  php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="config"
  
  use Illuminate\Foundation\Auth\User as Authenticatable;
  use Spatie\Permission\Traits\HasRoles;
  class User extends Authenticatable
  {
      use HasRoles;
      // ...
   }
   
  
# Add Classmap in Composer.json 
    
     "autoload": {
        "classmap": [
            "database/seeds",
            "database/factories"
        ],
        "psr-4": {
            "App\\": "app/",
            "Sithu\\UserAcl\\": "packages/sithu/useracl/src/"
        }
      },
# php artisan migrate

# php artisan db:seed --class=Sithu\\UserAcl\\Seeds\\UserAclSeeder

# php artisan vendor:publish choose Sithu-useracl

# 'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
