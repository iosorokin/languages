<?php

declare(strict_types=1);

namespace Domain\Personal\Values\Accesses;

use Illuminate\Support\Collection;
use Illuminate\Support\Stringable;

final class AccessesImp implements Accesses
{
    private Collection $roles;

    private function __construct()
    {
        $this->roles = collect();
    }

    public static function new(array $roles = []): self|InvalidAccessesObject
    {
        $accesses = new self();
        foreach ($roles as $role) {
            $enum = Access::tryFrom($role);
            if (! $enum) {
                return InvalidAccessesObject::new([
                    'accesses.enum.' => [
                        'expect' => Access::cases(),
                    ]
                ]);
            }
            $accesses->addAccess($enum);
        }

        return $accesses;
    }

    public function addAccess(string|Access $access): self
    {
        if (is_string($access)) {
            $access = Access::tryFrom($access);
        }
        $this->roles->push($access);

        return $this;
    }

    public function deleteAccess(string|Access $access): self
    {
        if (is_string($access)) {
            $access = Access::tryFrom($access);
        }

        $this->roles->each(function (Access $item, int $key) use ($access){
            if ($access->value === $item->value) {
                $this->roles->forget($key);
            }
        });

        return $this;
    }

    public function isUser(): bool
    {
        return (bool) $this->roles->first(
            fn (Access $item) => $item->isUser()
        );
    }

    public function isRoot(): bool
    {
        return (bool) $this->roles->first(
            fn (Access $item) => $item->isRoot()
        );
    }

    public function isAdmin(): bool
    {
        return (bool) $this->roles->first(
            fn (Access $item) => $item->isAdmin()
        );
    }

    public function toArray(): array
    {
        $this->roles->transform(function (Access $role) {
            return $role->value;
        });

        return $this->roles->toArray();
    }
}
