<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Controll\Queries\Languages;

use Illuminate\Support\Arr;

final class LanguageFilter
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?string $nativeName,
    ) {}

    public static function new(array $attributes): self
    {
        return new static(
            name: Arr::get($attributes, 'name'),
            nativeName: Arr::get($attributes, 'native_name'),
        );
    }
}
