<?php

namespace Modules\Personal\Auth\Dto;

class GetBaseAuthDto
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
    ) {}
}
