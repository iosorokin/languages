<?php

declare(strict_types=1);

namespace Domain\Manager\Languages\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

final class LanguageFilter
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?string $nativeName,
    ) {}

    public function filter(Builder $query): void
    {
        if ($this->name) $query->whereName($this->name);
        if ($this->nativeName) $query->whereNativeName($this->nativeName);
    }

    public static function new(array $attributes): self
    {
        return new static(
            name: Arr::get($attributes, 'name'),
            nativeName: Arr::get($attributes, 'nativeName'),
        );
    }
}
