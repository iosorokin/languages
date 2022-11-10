<?php

declare(strict_types=1);

namespace App\Model\Values\Favorite;

final class IsFavoriteImp implements IsFavorite
{
    private function __construct(
        private bool $isFavorite
    ) {}

    public static function new(bool $isFavorite): self
    {
        $isFavorite = new self($isFavorite);

        return $isFavorite;
    }

    public function get(): bool
    {
        return $this->isFavorite;
    }

    public function compare(IsFavorite $isFavorite): bool
    {
        return $this->get() === $isFavorite->get();
    }
}
