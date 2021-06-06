<?php

declare(strict_types=1);

namespace Laracart\Contracts;

use Laracart\Exceptions\CartPersistException;

interface Storable
{
    /**
     * @return bool
     * @throws CartPersistException
     */
    public function save(): bool;
}
