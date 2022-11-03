<?php

declare(strict_types=1);

namespace Domain\Personal\Values\Accesses;

use Illuminate\Support\Collection;

abstract class BaseAccesses
{
    protected function __construct(
        protected Collection $collection,
    ) { }

    public function isUser(): bool
    {
        return (bool) $this->collection->first(
            fn (Access $item) => $item->isUser()
        );
    }

    public function isRoot(): bool
    {
        return (bool) $this->collection->first(
            fn (Access $item) => $item->isRoot()
        );
    }

    public function isAdmin(): bool
    {
        return (bool) $this->collection->first(
            fn (Access $item) => $item->isAdmin()
        );
    }

    public function toArray(): array
    {
        $this->collection->transform(function (Access $role) {
            return $role->value;
        });

        return $this->collection->toArray();
    }
}
