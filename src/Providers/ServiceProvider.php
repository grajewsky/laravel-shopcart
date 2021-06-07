<?php

declare(strict_types=1);

namespace Laracart\Providers;

use Laracart\Laracart;
use Laracart\Services\Persist\Eloquent;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../../config/config.php", "laracart");
        $this->app->singleton(Eloquent::class, fn($app) => new Eloquent(
            config('laracart', []),
        );

        $this->app->singleton("laracart", fn($app) => new Laracart(
            config('laracart', []),
            $this->app['session']),
            $this->app['events']
        ));
    }
}
