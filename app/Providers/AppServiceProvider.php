<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CakesService;
use App\Services\CakesServiceImplement;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CakesService::class, CakesServiceImplement::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
