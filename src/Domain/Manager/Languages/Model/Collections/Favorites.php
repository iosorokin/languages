<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Manager\Collections;

use App\Values\Identificatiors\Id\IntId;
use Domain\Core\Languages\Model\Manager\Aggregates\Manager\ManagerLanguage;
use Illuminate\Support\Collection;

final class Favorites
{
    private Collection $collection;

    public function __construct(array $attributes = [])
    {
        $this->collection = collect($attributes);
    }

    public function add(ManagerLanguage $language): self
    {
        $hasLanguage = $this->collection->where(
            fn(ManagerLanguage $item) => $item->id()->compare($language->id())
        )->isNotEmpty();
        if (! $hasLanguage) {
            $this->collection->push($language);
        }

        return $this;
    }

    public function has(ManagerLanguage|IntId $language): bool
    {
        if ($language instanceof ManagerLanguage) {
            $language = $language->id();
        }

        return $this->collection->where(
            fn(ManagerLanguage $item) => $item->id()->compare($language)
        )->isNotEmpty();
    }

    public function delete(ManagerLanguage $language): self
    {
        $this->collection = $this->collection->filter(
            fn(ManagerLanguage $item) => $item->id()->compare($language->id())
        );

        return $this;
    }

    public function toArray(): array
    {
        return $this->collection->toArray();
    }
}
