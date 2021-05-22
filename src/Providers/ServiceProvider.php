<?php

declare(strict_types=1);

namespace Laracart\Providers;

use Laracart\Laracart;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->app->bind("laracart", fn($app) => new Laracart());
    }
}
