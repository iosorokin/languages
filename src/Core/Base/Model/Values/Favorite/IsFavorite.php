<?php

namespace Core\Base\Model\Values\Favorite;

use Core\Base\Model\Values\ValueObject;

interface IsFavorite extends ValueObject
{
    public function get(): bool;

    public function compare(IsFavorite $isFavorite): bool;
}
