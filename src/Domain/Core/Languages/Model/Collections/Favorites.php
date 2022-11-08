<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Collections;

use App\Values\Identificatiors\Id\IntId;
use Domain\Core\Languages\Model\Agregates\Language\Language;
use Illuminate\Support\Collection;

final class Favorites
{
    private Collection $collection;

    public function __construct(array $attributes = [])
    {
        $this->collection = collect($attributes);
    }

    public function add(Language $language): self
    {
        $hasLanguage = $this->collection->where(
            fn(Language $item) => $item->id()->compare($language->id())
        )->isNotEmpty();
        if (! $hasLanguage) {
            $this->collection->push($language);
        }

        return $this;
    }

    public function has(Language|IntId $language): bool
    {
        if ($language instanceof Language) {
            $language = $language->id();
        }

        return $this->collection->where(
            fn(Language $item) => $item->id()->compare($language)
        )->isNotEmpty();
    }

    public function delete(Language $language): self
    {
        $this->collection = $this->collection->filter(
            fn(Language $item) => $item->id()->compare($language->id())
        );

        return $this;
    }

    public function toArray(): array
    {
        return $this->collection->toArray();
    }
}
