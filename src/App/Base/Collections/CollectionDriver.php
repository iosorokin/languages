<?php

namespace App\Base\Collections;

interface CollectionDriver
{
    public function __construct(array $items = []);
}
