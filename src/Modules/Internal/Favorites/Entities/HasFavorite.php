<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Entities;

trait HasFavorite
{
    private bool $isFavorite;

    public function setIsFavorite(bool $isFavorite): self
    {
        $this->isFavorite = $isFavorite;

        return $this;
    }

    public function isFavorite(): bool
    {
        return $this->isFavorite;
    }
}
