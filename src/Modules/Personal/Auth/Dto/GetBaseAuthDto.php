<?php

namespace Modules\Personal\Auth\Dto;

use Illuminate\Support\Arr;

class GetBaseAuthDto
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
    ) {}

    public static function new(array $attributes): self
    {
        return new self(
            email: Arr::get($attributes, 'email'),
            password: Arr::get($attributes, 'password'),
        );
    }
}
