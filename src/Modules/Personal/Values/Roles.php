<?php

declare(strict_types=1);

namespace Modules\Personal\Values;

use Illuminate\Support\Collection;
use Modules\Personal\Enums\Role;

final class Roles
{
    private Collection $roles;

    public function __construct(array $roles = [])
    {
        $this->roles = collect();
        foreach ($roles as $role) {
            $this->addRole(Role::tryFrom($role));
        }
    }

    public function isUser(): bool
    {
        return (bool) $this->roles->first(
            fn (Role $item) => $item->isUser()
        );
    }

    public function assignAsUser(): self
    {
        if (! $this->isUser()) {
            $this->addRole(Role::User);
        }

        return $this;
    }

    public function demoteUser(): self
    {
        if ($this->isUser()) {
            $this->deleteRole(Role::User);
        }

        return $this;
    }

    public function assignAsRoot(): self
    {
        if (! $this->isRoot()) {
            $this->addRole(Role::Root);
        }

        return $this;
    }

    public function isRoot(): bool
    {
        return (bool) $this->roles->first(
            fn (Role $item) => $item->isRoot()
        );
    }

    public function assignAsAdmin(): self
    {
        if (! $this->isAdmin()) {
            $this->addRole(Role::Admin);
        }

        return $this;
    }

    public function demoteAdmin(): self
    {
        if ($this->isAdmin()) {
            $this->deleteRole(Role::Admin);
        }

        return $this;
    }

    public function isAdmin(): bool
    {
        return (bool) $this->roles->first(
            fn (Role $item) => $item->isAdmin()
        );
    }

    public function toArray(): array
    {
        $this->roles->transform(function (Role $role) {
            return $role->value;
        });

        return $this->roles->toArray();
    }

    private function addRole(Role $role): self
    {
        $this->roles->push($role);

        return $this;
    }

    private function deleteRole(Role $role): self
    {
        $this->roles->each(function (Role $item, int $key) use ($role){
            if ($role->value === $item->value) {
                $this->roles->forget($key);
            }
        });

        return $this;
    }
}
