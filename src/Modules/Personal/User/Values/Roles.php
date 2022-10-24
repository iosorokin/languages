<?php

declare(strict_types=1);

namespace Modules\Personal\User\Values;

use Illuminate\Support\Collection;
use Modules\Personal\User\Enums\Role;

final class Roles
{
    private Collection $roles;

    public function __construct(array $roles)
    {
        $this->roles = collect($roles);
    }

    public function addRole(Role $role): self
    {
        $this->roles->push($role);

        return $this;
    }

    public function deleteRole(string $role): self
    {
        $this->roles->forget(
            fn (string $item) => $item === $role,
        );

        return $this;
    }

    public function isRoot(): bool
    {
        return (bool) $this->roles->first(
            fn (string $item) => $item === 'root'
        );
    }

    public function isAdmin(): bool
    {
        return (bool) $this->roles->first(
            fn (string $item) => $this->isRoot() || $item === Role::Admin->value
        );
    }

    public function isUser(): bool
    {
        return (bool) $this->roles->first(
            fn (string $item) => $item === Role::User->value
        );
    }

    public function toArray(): array
    {
        return $this->roles->toArray();
    }
}
