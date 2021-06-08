# Laracart - Shoppingcart for Laravel/Lumen

## Installation

```shell
composer require gssc/laracart
```


## Configuration

Package configuration ``config/config.php``


## Getting started


### Methods

- [add()](#laracartadd---adding-product-to-cart)
- [remove()](#laracartremove---remove-product-from-cart)
- [store()](#laracartstore---persist-cart-content)
- [items()](#laracartitems---cart-content)

### Laracart::add() - Adding product to cart 
```php
<?php

use Laracart\Facades\Laracart;
// $product is array of shape Laracart\Shapes\ProductShape::class
#[\JetBrains\PhpStorm\ArrayShape(\Laracart\Shapes\ProductShape::SHAPE)]
$product = [
    'id' => 1,
    'quantity' => 1,
    'name' => 'Product',
    'price' => \Money\Money::PLN(100)
];
// or Implementation of  Laracart\Contracts\Product
$product = new \Laracart\Concrete\Product(id: 1, name: 'Product', price: \Money\Money::PLN(100), quantity: 1)
Laracart::add($product);
```

### Laracart::remove() - Remove product from cart 
```php
<?php

use Laracart\Facades\Laracart;
// Return Laracart\Contracts\Product or null if not exist
Laracart::remove(1); 
```

### Laracart::store() - Persist cart content
```php
<?php
use Laracart\Facades\Laracart;
// Adding products etc.
// ...
// Store cart content in storage driver - look at configuration file
Laracart::store(\Illuminate\Support\Facades\Auth::id());
```

Package has implements Eloquent driver `Laracart\Services\Persist\Eloquent::class`

Functionality has persist interface to replace driver. `Laracart\Contracts\CartPersist`

Interface `CartPersist` provide methods:
- `store(string $identifier, Collection<Product> $products): bool`
- `restore(string $identifier): Collection<Product> throws Laracart\ExceptionsNotFoundException`

### Laracart::items() - Cart content

```php
<?php
use Laracart\Facades\Laracart;
// Adding products etc.
// ...
$products = Laracart::items(); // returns Collection<Product>
```
