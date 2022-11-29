<?php

declare(strict_types=1);

namespace App\Education\Language\Root\Control\Cases\Dto;

final class CreateLanguageDto
{
    private function __construct(
        public readonly int    $ownerId,
        public readonly string $nativeName,
        public readonly string $name,
        public readonly string $code,
    ) {}

    public static function new(array $attributes): self
    {
        return new self(
            ownerId: $attributes['owner_id'],
            nativeName: $attributes['native_name'],
            name: $attributes['name'],
            code: $attributes['code']
        );
    }
}
