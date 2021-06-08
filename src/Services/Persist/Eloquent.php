<?php

declare(strict_types=1);

namespace Laracart\Services\Persist;

use Laracart\Events\CartStored;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Support\Facades\DB;
use Laracart\Contracts\CartPersist;
use Laracart\Shapes\ConfigurationShape;
use Laracart\Exceptions\NotFoundException;
use Symfony\Component\EventDispatcher\EventDispatcher;

class Eloquent implements CartPersist
{
    public function __construct(
        #[ArrayShape(ConfigurationShape::SHAPE)]
        private array $configuration,
        private EventDispatcher $dispatcher
    ) {}


    /**
     * @param string $identifier
     * @param Collection<\Laracart\Concrete\Product> $products
     * @return bool
     */
    public function store(string $identifier, Collection $products): bool
    {
        DB::table($this->configuration['eloquent']['table'])
            ->insert([
                'id' => $identifier,
                'items' => serialize($products)
            ]);

        $this->dispatcher->dispatch(new CartStored($products));
    }

    /**
     * @param string $identifier
     * @return Collection
     * @throws NotFoundException
     */
    public function restore(string $identifier): Collection
    {
        $laracart = DB::table($this->configuration['eloquent']['table'])
            ->select(['items'])
            ->first(['items']);

        if (is_null($laracart)) {
            throw new NotFoundException('Laracart with id: ' . $identifier . ' not found.');
        }

        $restored = unserialize($laracart->items);

        return $restored;
    }
}
