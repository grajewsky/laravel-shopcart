<?php

declare(strict_types=1);

namespace Laracart\Contracts;

use Laracart\Exceptions\CartPersistException;

interface CartPersist
{
    /**
     * @return bool
     * @throws CartPersistException
     */
    public function save(): bool;
}
