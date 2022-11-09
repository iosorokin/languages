<?php

declare(strict_types=1);

namespace Domain\Personal\Account\Dto;

use App\Contracts\Dto;

final class NewAccountDto extends UserDto implements Dto
{
    protected function __construct(array $attributes)
    {
        $this->name = $attributes['name'];
        $this->email = $attributes['email'];
        $this->password = $attributes['password'];
        $this->accesses = $attributes['roles'] ?? [];
    }

    public static function new(array $attributes): self
    {
        return new self($attributes);
    }
}
