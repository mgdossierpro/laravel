<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CacheServiceProvider extends ServiceProvider
{

    // soit le defer a true soit la fonction boot
    protected $defer = true;

   // permet de lancer linstanciation au demarrage
   // public function boot(){

    //}

    public function register()
    {
        $this->app->bind('App\CacheInterface', 'App\CacheFile');
    }

    public function provides()
    {
        // definis quand est ce qu'on doit utiliser la fonction register

        return['App\CacheInterface'];
    }

}
