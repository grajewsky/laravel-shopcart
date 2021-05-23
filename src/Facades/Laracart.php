<?php

declare(strict_types=1);

namespace Laracart\Facades;

use Laracart\Contracts\Product;
use Illuminate\Support\Facades\Facade;

/**
 * Class Laracart
 * @package Laracart\Facades
 * @static-method Product add(Product $product)
 * @static-method Product remove()
 */
class Laracart extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'laracart';
    }
}
