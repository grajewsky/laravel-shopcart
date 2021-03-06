<?php

declare(strict_types=1);

namespace Laracart\Events;

use Laracart\Contracts\Product;
use Illuminate\Queue\SerializesModels;

trait ProductEvent
{
    use SerializesModels;

    public function __construct(private Product $product) { }

    public function getProduct(): Product
    {
        return $this->product;
    }
}
