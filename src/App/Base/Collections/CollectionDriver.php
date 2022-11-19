<?php

namespace App\Base\Collections;

interface CollectionDriver
{
    public function __construct(array $items = []);

    public function count(): int;

    public function each(callable $callback): self;
}
