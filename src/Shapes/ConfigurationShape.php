<?php

declare(strict_types=1);

namespace Laracart\Shapes;

final class ConfigurationShape
{
    public const SHAPE = [
        'session_key_prefix' => 'string',
        'price_scale' => 'int',
        'currency' => 'string',
        'tax_percent' => 'float|int',
        'persist' => 'array',
        'eloquent' => 'array'
    ];
}
