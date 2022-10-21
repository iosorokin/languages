<?php

namespace Modules\Internal\Favorites\Entities;

interface Favoriteable
{
    public function isFavorite(): bool;

    public function setIsFavorite(bool $isFavorite): self;
}
