<?php

declare(strict_types=1);

namespace Domain\Personal\Dto;

use App\Contracts\BaseDto;
use App\Contracts\Dto;

final class PersonalDto extends BaseDto implements Dto
{
    public readonly string $name;
    public readonly string $email;
    public readonly string $password;
    public readonly array $roles;

    private function __construct(array $attributes)
    {
        $this->name = $attributes['name'];
        $this->email = $attributes['email'];
        $this->password = $attributes['password'];
        $this->roles = $attributes['roles'] ?? [];
    }

    public static function new(array $attributes): array
    {
        [$attributes, $erorrs] = [$attributes, []];
        if (! empty($erorrs)) {
            return [[], $erorrs];
        }

        return [$attributes, []];
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
}
