<?php

namespace Modules\Personal\Auth\Dto;

use App\Contracts\AuthableStructure;
use Illuminate\Support\Arr;

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
