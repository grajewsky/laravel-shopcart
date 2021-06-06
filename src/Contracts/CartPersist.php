<?php

declare(strict_types=1);

namespace Laracart\Contracts;

use Illuminate\Support\Collection;
use Laracart\Exceptions\CartPersistException;

interface CartPersist
{
    /**
     * @param Collection<\Laracart\Concrete\Product> $products
     * @return bool
     * @throws CartPersistException
     */
    public function save(Collection $products): bool;
}
