<?php

declare(strict_types=1);

namespace Laracart\Concrete;

use Money\Money;
use JetBrains\PhpStorm\Immutable;

#[Immutable]
class Product implements \Laracart\Contracts\Product
{
    public function __construct(
        private mixed $id,
        private string $name,
        private Money $price,
        private int $quantity
    ) {}

    public function getId(): mixed
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): Money
    {
        return $this->price;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
