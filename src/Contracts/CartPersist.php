<?php

declare(strict_types=1);

namespace Laracart\Contracts;

use Illuminate\Support\Collection;
use Laracart\Exceptions\NotFoundException;
use Laracart\Exceptions\CartPersistException;

interface CartPersist
{
    /**
     * @param string $identifier
     * @param Collection<\Laracart\Concrete\Product> $products
     * @return bool
     * @throws CartPersistException
     */
    public function store(string $identifier, Collection $products): bool;

    /**
     * @param string $identifier
     * @return Collection
     * @throws NotFoundException
     */
    public function restore(string $identifier): Collection;
}
