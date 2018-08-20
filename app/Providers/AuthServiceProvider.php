<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
      $this->registerPolicies();
      Gate::define('create-ct',function($user){//el parámetro user va a retornar los datos del usuario que esta autentificado.
        return $user->tieneAcceso(['create-ct']);
      });
      Gate::define('bill-virt',function($user){//el parámetro user va a retornar los datos del usuario que esta autentificado.
        return $user->tieneAcceso(['bill-virt']);
      });
      Gate::define('mant-admin',function($user){//el parámetro user va a retornar los datos del usuario que esta autentificado.
        return $user->tieneAcceso(['mant-admin']);
      });
      Gate::define('admin-canjes',function($user){//el parámetro user va a retornar los datos del usuario que esta autentificado.
        return $user->tieneAcceso(['admin-canjes']);
      });
      Gate::define('cliente-cupones',function($user){//el parámetro user va a retornar los datos del usuario que esta autentificado.
        return $user->tieneAcceso(['cliente-cupones']);
      });
      //
    }
}
