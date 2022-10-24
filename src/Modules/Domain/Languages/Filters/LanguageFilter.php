<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Filters;

use Illuminate\Support\Arr;
use Modules\Domain\Languages\Queries\LanguageQueryBuilder;

final class LanguageFilter
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?string $nativeName,
    ) {}

    public function filter(LanguageQueryBuilder $builder): void
    {
        if ($this->name) $builder->whereName($this->name);
        if ($this->nativeName) $builder->whereNativeName($this->nativeName);
    }

    public static function new(array $attributes): self
    {
        return new static(
            name: Arr::get($attributes, 'name'),
            nativeName: Arr::get($attributes, 'nativeName'),
        );
    }
}
