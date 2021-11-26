PARA PASSPORT

composer require laravel/passport

php artisan migrate

php artisan passport:install

EN App\Models\NombreModelo

AGREGAR: HasApiTokens

use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
}
EN App\Providers\AuthServiceProvider

AGREGAR: Passport::routes();

public function boot()
    {
        $this->registerPolicies();

        if (! $this->app->routesAreCached()) {
            Passport::routes();
        }
    }
EN Config/auth.php  

CAMBIAR: token por passport
'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],

    'api' => [
        'driver' => 'passport',
        'provider' => 'users',
    ],
],  

En .ENV colocar 

PASSPORT_PERSONAL_ACCESS_CLIENT_ID=

PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET=

Con los campos que te da corriendo: php artisan passport:client

