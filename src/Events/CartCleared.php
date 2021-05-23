<?php

declare(strict_types=1);

namespace Laracart\Events;

use Illuminate\Support\Collection;
use Illuminate\Queue\SerializesModels;

class CartCleared
{
    use SerializesModels;

    public function __construct(public Collection $previousContent) {

    }
}
