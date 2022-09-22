<?php

namespace Modules\Personal\Auth\Dto;

use Illuminate\Support\Arr;
use Modules\Personal\Auth\Structures\AuthableStructure;

class CreateBaseAuthDto
{
    public readonly AuthableStructure $authable;

    public readonly ?string $email;

    public readonly ?string $password;

    public function __construct(AuthableStructure $authable, array $attributes)
    {
        $this->authable = $authable;
        $this->email = Arr::get($attributes, 'email');
        $this->password = Arr::get($attributes, 'password');
    }
}
