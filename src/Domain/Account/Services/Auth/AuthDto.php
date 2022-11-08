<?php

declare(strict_types=1);

namespace Domain\Account\Services\Auth;

final class AuthDto implements Auth
{
    public function __construct(
        private int $id,
        private bool $isRoot,
        private bool $isStudent,
    ) {}

    public function id(): int
    {
        return $this->id;
    }

    public function isRoot(): bool
    {
        return $this->isRoot;
    }

    public function isStudent(): bool
    {
        return $this->isStudent;
    }
}
