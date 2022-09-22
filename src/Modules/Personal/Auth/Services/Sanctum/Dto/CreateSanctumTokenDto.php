<?php

namespace Modules\Personal\Auth\Services\Sanctum\Dto;

use DateTimeInterface;
use Illuminate\Support\Arr;
use Modules\Personal\Auth\Structures\AuthableStructure;

class CreateSanctumTokenDto
{
    public function __construct(
        public readonly AuthableStructure  $authable,
        public readonly ?string             $name,
        public readonly ?array              $abilities,
        public readonly ?DateTimeInterface $expires_at = null,
    ) {}

    public static function new(AuthableStructure $authable, array $attributes = []): self
    {
        return new self(
            authable: $authable,
            name: Arr::get($attributes, 'name'),
            abilities: Arr::get($attributes, 'abilities'),
            expires_at: Arr::get($attributes, 'expires_at')
        );
    }
}
