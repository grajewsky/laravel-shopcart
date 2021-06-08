<?php

declare(strict_types=1);

namespace Laracart\Events;

use Illuminate\Support\Collection;
use Illuminate\Queue\SerializesModels;

class CartStored
{
    use SerializesModels;

    public function __construct(private Collection $products) { }

    public function getItems(): Collection
    {
        return $this->products;
    }
}
