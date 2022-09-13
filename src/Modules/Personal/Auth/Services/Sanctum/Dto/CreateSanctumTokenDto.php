<?php

namespace Modules\Personal\Auth\Services\Sanctum\Dto;

use App\Contracts\Structures\AuthableStructure;
use DateTimeInterface;
use Illuminate\Support\Arr;

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
