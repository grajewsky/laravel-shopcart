<?php

declare(strict_types=1);

namespace Laracart\Tests;

use Mockery\Mock;
use Laracart\Laracart;
use Laracart\Contracts\Product;
use Laracart\Providers\ServiceProvider;

class LaracartContainerTest extends TestCase
{
    /**
     *
     * @covers
     */
    public function testSingletonInstance()
    {
        $instance = app('laracart');
        $this->assertInstanceOf(Laracart::class, $instance);
    }

    /**
     *
     * @covers
     */
    public function testFacade()
    {
        $productMock = \Mockery::mock(Product::class, []);
        $product = \Laracart\Facades\Laracart::add($productMock);
        $this->assertSame($productMock, $product);
        $this->assertCount(1, \Laracart\Facades\Laracart::items());
    }
}
