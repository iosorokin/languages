<?php

namespace App\Model\Values\Favorite;

use App\Model\Values\ValueObject;

interface IsFavorite extends ValueObject
{
    public function get(): bool;
}
