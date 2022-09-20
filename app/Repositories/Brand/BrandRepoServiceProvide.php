<?php
namespace App\Repositories\Brand;


use Illuminate\Support\ServiceProvider;


class BrandRepoServiceProvide extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Brand\BrandInterface', 'App\Repositories\Brand\BrandRepository');
    }
}
