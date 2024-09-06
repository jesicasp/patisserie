<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CakesService;
use App\Services\CakesServiceImplement;
use App\Services\ChefsService;
use App\Services\ChefsServiceImplement;
use App\Services\VarianService;
use App\Services\VarianServiceImplement;
use App\Services\CakeVarianService;
use App\Services\CakeVarianServiceImplement;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CakesService::class, CakesServiceImplement::class);
        $this->app->bind(ChefsService::class, ChefsServiceImplement::class);
        $this->app->bind(VarianService::class, VarianServiceImplement::class);
        $this->app->bind(CakeVarianService::class, CakeVarianServiceImplement::class);


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
