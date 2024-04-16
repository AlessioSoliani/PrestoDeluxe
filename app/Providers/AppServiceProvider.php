<?php

namespace App\Providers;

use App\Models\Category;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if(Schema::hasTable('categories')){
            //mostro tutte le categorie presenti nel sistema
            View::share('categories',Category::all());
        }
        //per far funzionare il paginate() in questa versione laravel
        //assieme al use illuminate\Pagination\Paginator sopra importato
        paginator::useBootstrap();

    }
}
