<?php

declare(strict_types=1);

namespace Laracart;

use Laracart\Contracts\Product;
use Laracart\Shapes\ProductShape;
use Illuminate\Events\Dispatcher;
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Laracart\Shapes\ConfigurationShape;

class Laracart
{
    /**
     * @var Collection<Product> $items
     */
    private Collection $items;

    /**
     * @var string
     */
    private string $sessionKeyPrefix;

    public function __construct(
        #[ArrayShape(ConfigurationShape::SHAPE)]
        private array $configuration,
        private SessionManager $sessionManager,
        private Dispatcher $dispatcher
    ) { }

    private function getSessionItemsKey(): string
    {
        return $this->configuration['session_key_prefix'] . "_items";
    }
    private function addProductFromArray(#[ArrayShape(ProductShape::SHAPE)] array $product)
    {

    }

    public function add(
        #[ArrayShape(ProductShape::SHAPE)]
        array|Product $product
    ) {
        if (is_array($product)) {
            $this->
        }
    }
}
