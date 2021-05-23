<?php

declare(strict_types=1);

namespace Laracart\Shapes;

use Money\Money;

class ProductShape
{
    public const SHAPE = [
        "id" => "int",
        "name" => "string",
        "quantity" => "int",
        "price" => Money::class,
    ];
}
