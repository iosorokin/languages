<?php

declare(strict_types=1);

namespace App\Base\Collections\Laravel;

use App\Base\Collections\CollectionDriver;
use Illuminate\Support\Collection;

final class LaravelCollectionDriver implements CollectionDriver
{
    public function __construct(array $items = [])
    {
        return new Collection($items);
    }
}
