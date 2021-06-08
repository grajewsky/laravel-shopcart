# Laracart - Shoppingcart for Laravel/Lumen

## Installation

```shell
composer require gssc/laracart
```


## Configuration

Package configuration ``config/config.php``


## Getting started

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
