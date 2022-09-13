<?php

namespace Modules\Personal\Auth\Dto;

use App\Contracts\Structures\AuthableStructure;

class AuthDto
{
    public function __construct(
        public readonly AuthableStructure $authable,
    ) {}

    public static function new(AuthableStructure $authable): self
    {
        return new self(
            authable: $authable,
        );
    }
}
