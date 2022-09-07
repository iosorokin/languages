<?php

namespace Modules\Personal\Auth\Services\Sanctum\Dto;

use App\Contracts\AuthableStructure;
use DateTimeInterface;
use Illuminate\Support\Arr;

class CreateSanctumTokenDto
{
    public function __construct(
        public readonly AuthableStructure $authable,
        public readonly string $name,
        public readonly array $abilities = ['*'],
        public readonly ?DateTimeInterface $expiresAt = null,
    ) {}
}
