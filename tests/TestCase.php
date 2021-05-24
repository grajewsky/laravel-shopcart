<?php

declare(strict_types=1);

namespace Laracart\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function tearDown(): void
    {
        parent::tearDown();
        \Mockery::close();
    }
}
