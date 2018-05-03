<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Year;
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
    $years = Year::pluck('name', 'id');

        view()->share(compact('years'));

        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
