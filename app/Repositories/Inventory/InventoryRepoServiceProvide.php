<?php
namespace App\Repositories\Inventory;


use Illuminate\Support\ServiceProvider;


class InventoryRepoServiceProvide extends ServiceProvider
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
        $this->app->bind('App\Repositories\Inventory\InventoryInterface', 'App\Repositories\Inventory\InventoryRepository');
    }
}
