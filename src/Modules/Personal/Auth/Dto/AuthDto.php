<?php

namespace Modules\Personal\Auth\Dto;

use App\Contracts\Structures\AuthableStructure;

class AuthDto
{
    public function __construct(
        public readonly AuthableStructure $authable,
        public readonly array $headers = [],
    ) {}
}
