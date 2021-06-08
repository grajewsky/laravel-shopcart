<?php

return [
    "session_key_prefix" => "laracart_",
    "price_scale" =>  100,
    'currency' => 'USD',
    'tax_percent' => 23,
    'persist' => [
        'uses' => [],
        'drivers' => [
            'eloquent' => \Laracart\Services\Persist\Eloquent::class
        ]
    ],

    'eloquent' => [
        'table' => 'laracart',
    ]
];
