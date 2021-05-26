<?php

declare(strict_types=1);

namespace Laracart\Tests;

use Laracart\Providers\ServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function getPackageProviders($app): array
    {
        return [
            ServiceProvider::class
        ];
    }

    public function tearDown(): void
    {
        parent::tearDown();
        \Mockery::close();
    }
}
