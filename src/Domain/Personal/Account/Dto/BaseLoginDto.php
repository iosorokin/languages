<?php

declare(strict_types=1);

namespace Domain\Personal\Account\Dto;

final class BaseLoginDto
{
    private string $email;
    private string $password;

    public function __construct(array $attributes)
    {
        $this->email = $attributes['email'];
        $this->password = $attributes['password'];
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
