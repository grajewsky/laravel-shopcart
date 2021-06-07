<?php

declare(strict_types=1);

namespace Laracart\Services\Persist;

use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;
use Laracart\Contracts\CartPersist;
use Laracart\Shapes\ConfigurationShape;
use Laracart\Exceptions\CartPersistException;

class Eloquent implements CartPersist
{
    public function __construct(
        #[ArrayShape(ConfigurationShape::SHAPE)]
        private array $configuration,
    ) {}


    /**
     * @param string $identifier
     * @param Collection<\Laracart\Concrete\Product> $products
     * @return bool
     */
    public function store(string $identifier, Collection $products): bool
    {
        return false;
    }
}
