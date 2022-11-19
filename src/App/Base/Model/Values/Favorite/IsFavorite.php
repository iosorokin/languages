<?php

namespace App\Base\Model\Values\Favorite;

use App\Base\Model\Values\ValueObject;

interface IsFavorite extends ValueObject
{
    public function get(): bool;

    public function compare(IsFavorite $isFavorite): bool;
}
