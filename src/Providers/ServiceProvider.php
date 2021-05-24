<?php

declare(strict_types=1);

namespace Laracart\Providers;

use Laracart\Laracart;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../../config/config.php", "laracart");

        $this->app->singleton("laracart", fn($app) => new Laracart(
            config('laracart', []),
            $this->app['session'],
            $this->app['events']
        ));
    }
}
