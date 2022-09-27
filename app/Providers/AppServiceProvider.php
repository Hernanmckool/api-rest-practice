<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use Globalhitss\Common\Cache\RedisCache;
use Globalhitss\Common\Cache\RedisCacheInterface;
use Globalhitss\Pgs\ExternalServices\ExternalServiceClient;
use Globalhitss\Common\ExternalServices\interfaces\ExternalServiceClientInterface;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        JsonResource::withoutWrapping();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ExternalServiceClientInterface::class,
            ExternalServiceClient::class
        );

        $this->app->bind(
            RedisCacheInterface::class,
            RedisCache::class
        );
    }
}
