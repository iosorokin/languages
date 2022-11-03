<?php

declare(strict_types=1);

namespace Domain\Personal\Dto;

use App\Contracts\BaseDto;

abstract class UserDto extends BaseDto
{
    public string $name;
    public string $email;
    public string $password;
    public array $accesses;

    protected function __construct(array $attributes)
    {
        $this->name = $attributes['name'];
        $this->email = $attributes['email'];
        $this->password = $attributes['password'];
        $this->accesses = $attributes['accesses'] ?? [];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getAccesses(): array
    {
        return $this->accesses;
    }
}
