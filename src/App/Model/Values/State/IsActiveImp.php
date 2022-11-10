<?php

declare(strict_types=1);

namespace App\Model\Values\State;

final class IsActiveImp implements IsActive
{
    private function __construct(
        private bool $isActive,
    ) {}

    public static function new(bool $isActive): IsActive
    {
        return new self($isActive);
    }

    public function get(): bool
    {
        return $this->isActive;
    }

    public function compare(IsActive $isActive): bool
    {
        return $this->get() === $isActive->get();
    }

    public function toBool(): bool
    {
        return $this->get();
    }

    public function activate(): self
    {
        $this->isActive = true;

        return $this;
    }

    public function deactivate(): self
    {
        $this->isActive = false;

        return $this;
    }
}
