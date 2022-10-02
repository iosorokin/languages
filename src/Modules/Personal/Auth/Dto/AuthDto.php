<?php

namespace Modules\Personal\Auth\Dto;

use Modules\Personal\Auth\Entity\AuthableStructure;

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
