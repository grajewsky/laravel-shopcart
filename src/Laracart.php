<?php

declare(strict_types=1);

namespace Laracart;

use Laracart\Contracts\CartPersist;
use Laracart\Events\ItemAdded;
use Laracart\Contracts\Product;
use Laracart\Events\ItemDeleted;
use Laracart\Events\CartCleared;
use Laracart\Shapes\ProductShape;
use Illuminate\Events\Dispatcher;
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Laracart\Shapes\ConfigurationShape;

class Laracart implements CartPersist
{
    /**
     * @var Collection<Product> $items
     */
    private Collection $items;

    private string $sessionKey;

    public function __construct(
        #[ArrayShape(ConfigurationShape::SHAPE)]
        private array $configuration,
        private SessionManager $sessionManager,
        private Dispatcher $dispatcher
    ) {
        $this->items = new Collection();
        $this->sessionKey = "cart";
    }

    private function saveItems(Collection $items, ?string $sessionKey = null): void
    {
        $sessionKey ??= $this->getSessionItemsKey();
        $this->sessionManager->put($sessionKey, $items);
    }

    private function dispatch(mixed $event)
    {
        $this->dispatcher->dispatch($event);
    }

    private function getSessionItemsKey(): string
    {
        return $this->configuration['session_key_prefix'] . $this->sessionKey ."_items";
    }

    private function addProductFromArray(#[ArrayShape(ProductShape::SHAPE)] array $product)
    {
        return new \Laracart\Concrete\Product(
            $product['id'],
            $product['name'],
            $product['price'],
            $product['quantity']
        );
    }

    public function session(string $key)
    {
        $this->sessionKey = $key;
    }

    public function add(
        #[ArrayShape(ProductShape::SHAPE)]
        array|Product $product
    ): Product {
        if (is_array($product)) {
            $productImpl = $this->addProductFromArray($product);
            $this->items->add($productImpl);
            return $productImpl;
        }

        $this->items->add($product);
        $this->saveItems($this->items);
        $this->dispatch(new ItemAdded($product));
        return $product;
    }

    public function remove(mixed $productId): Product|null
    {
        $foundKey = $this->items->search( fn(Product $product, $key) => $product->getId() === $productId);
        if ($foundKey === false) {
            return null;
        }
        $product = $this->items->get($foundKey);
        $spliced = $this->items->splice($foundKey, 1);

        $this->items = $spliced;
        $this->saveItems($this->items);
        $this->dispatch(new ItemDeleted($product));
        return $product;
    }

    /**
     * @return Collection<Product>
     */
    public function items(): Collection
    {
        return $this->items;
    }

    public function clear(): void
    {
        $items = clone $this->items;
        $this->items = new Collection();
        $this->saveItems(new Collection());
        event(new CartCleared($items));
    }

    public function save(): bool
    {
        return false;
    }

}
