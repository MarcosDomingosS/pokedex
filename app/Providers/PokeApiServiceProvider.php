<?php

namespace App\Providers;

use GuzzleHttp\Client;
use App\Services\PokeApiService;
use Illuminate\Support\ServiceProvider;

class PokeApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *  @return void
     */
    public function register(): void
    {
         // Aqui você está dizendo ao Laravel para usar Client do Guzzle
        // quando alguém solicitar PokeApiService
        $this->app->singleton(PokeApiService::class, function ($app) {
            return new PokeApiService(new Client());
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
