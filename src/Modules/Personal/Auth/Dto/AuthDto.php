<?php

namespace Modules\Personal\Auth\Dto;

use App\Contracts\AuthableStructure;
use Illuminate\Support\Arr;

class AuthDto
{
    public function __construct(
        public readonly AuthableStructure $authable,
        public readonly array $headers = [],
    ) {}
}
