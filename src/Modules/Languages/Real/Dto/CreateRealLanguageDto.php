<?php

namespace Modules\Languages\Real\Dto;

use Illuminate\Support\Arr;

class CreateRealLanguageDto
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?string $nativeName,
        public readonly ?string $code,
    ) {}

    public static function new(array $attributes): self
    {
        return new self(
            name: Arr::get($attributes, 'name'),
            nativeName: Arr::get($attributes, 'native_name'),
            code: Arr::get($attributes, 'code'),
        );
    }
}
