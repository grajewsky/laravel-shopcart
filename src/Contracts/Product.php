<?php

declare(strict_types=1);

namespace Laracart\Contracts;

use Money\Money;

interface Product
{
    public function getId(): mixed;
    public function getName(): string;
    public function getPrice(): Money;
    public function getQuantity(): int;
}
