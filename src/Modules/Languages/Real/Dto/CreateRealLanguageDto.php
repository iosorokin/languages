<?php

namespace Modules\Languages\Real\Dto;

use Illuminate\Support\Arr;

class CreateRealLanguageDto
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?string $native_name,
        public readonly ?string $code,
    ) {}

    public static function new(array $attributes): self
    {
        return new self(
            name: Arr::get($attributes, 'name'),
            native_name: Arr::get($attributes, 'native_name'),
            code: Arr::get($attributes, 'code'),
        );
    }
}
