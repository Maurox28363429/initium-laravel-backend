<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\{
    golobjetivos
};
use App\Observers\{
    GolObjetivosObserver
};
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GolObjetivosObserver::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         
    }
}
