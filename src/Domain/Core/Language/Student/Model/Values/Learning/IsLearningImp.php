<?php

declare(strict_types=1);

namespace Domain\Core\Language\Student\Model\Values\Learning;

final class IsLearningImp implements IsLearning
{
    public function __construct(
        private bool $isActive,
    ) {}

    public function get(): bool
    {
        return $this->isActive;
    }

    public function compare(IsLearning $isLearning): bool
    {
        return $this->get() === $isLearning->get();
    }
}
