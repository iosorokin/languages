<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Repositories\Filters;

use Illuminate\Support\Arr;
use Modules\Domain\Languages\Repositories\BaseLanguageQueryBuilder;

final class LanguageFilter
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?string $nativeName,
        public readonly ?string $code,
    ) {}

    public function filter(BaseLanguageQueryBuilder $builder): void
    {
        if ($this->name) $builder->whereName($this->name);
        if ($this->nativeName) $builder->whereNativeName($this->nativeName);
        if ($this->code) $builder->whereCode($this->code);
    }

    public static function new(array $attributes): self
    {
        return new static(
            name: Arr::get($attributes, 'name'),
            nativeName: Arr::get($attributes, 'nativeName'),
            code: Arr::get($attributes, 'code'),
        );
    }
}
