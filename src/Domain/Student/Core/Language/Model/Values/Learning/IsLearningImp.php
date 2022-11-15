<?php

declare(strict_types=1);

namespace Domain\Student\Core\Language\Model\Values\Learning;

final class IsLearningImp implements IsLearning
{
    public function __construct(
        private bool $isLearning,
    ) {}

    public static function new(bool $isLearning): IsLearning
    {
        return new self($isLearning);
    }

    public function get(): bool
    {
        return $this->isLearning;
    }

    public function compare(IsLearning $isLearning): bool
    {
        return $this->get() === $isLearning->get();
    }
}
