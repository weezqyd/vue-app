<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\SupplierRepositoryEloquent;
use App\Repositories\SupplierRepository;
use App\Repositories\ProductRepositoryEloquent;
use App\Repositories\ProductRepository;
use App\Repositories\{OrderRepository, OrderRepositoryEloquent};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SupplierRepository::class, SupplierRepositoryEloquent::class);
        $this->app->bind(ProductRepository::class, ProductRepositoryEloquent::class);
        $this->app->bind(OrderRepository::class, OrderRepositoryEloquent::class);
    }
}
