<?php

namespace Modules\Personal\Auth\Services\Sanctum\Dto;

use DateTimeInterface;
use Illuminate\Support\Arr;
use Modules\Personal\User\Structures\User;

class CreateSanctumTokenDto
{
    public function __construct(
        public readonly User               $user,
        public readonly ?string            $name,
        public readonly ?array             $abilities,
        public readonly ?DateTimeInterface $expires_at = null,
    ) {}

    public static function new(User $user, array $attributes = []): self
    {
        return new self(
            user: $user,
            name: Arr::get($attributes, 'name'),
            abilities: Arr::get($attributes, 'abilities'),
            expires_at: Arr::get($attributes, 'expires_at')
        );
    }
}
