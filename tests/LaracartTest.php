<?php

declare(strict_types=1);

namespace Laracart\Tests;

use Money\Money;
use Money\Currency;
use Laracart\Facades\Laracart;
use Laracart\Contracts\Product;

/**
 * Class LaracartTest
 * @package Laracart\Tests
 * @covers
 */
class LaracartTest extends TestCase
{
    public function testAddMethod()
    {
        $this->assertCount(0, Laracart::items());
        $product = Laracart::add([
            "id" => 1,
            "name" => "test",
            "quantity" => 1,
            "price" => new Money(99, new Currency("PLN"))
        ]);
        $this->assertInstanceOf(Product::class, $product);
        $this->assertCount(1, Laracart::items());
    }
}
