<?php

declare(strict_types=1);

namespace Domain\Education\Language\Base\Model\Value\Status;

use Domain\Education\Language\Base\Model\Enum\LanguageStatusEnum;

final class StatusImp implements Status
{
    private function __construct(
        private LanguageStatusEnum $status,
    ) {}

    public static function new(string $status): Status
    {
        $enum = LanguageStatusEnum::tryFrom($status);
        if (! $enum) {
            return InvalidStatus::new([
                sprintf(
                    'Status %s not allowed. Allowed: %s',
                    $status,
                    implode('|', LanguageStatusEnum::cases())
                )
            ]);
        }

        return new self($enum);
    }

    public static function active(): Status
    {
        return new self(LanguageStatusEnum::Active);
    }

    public static function draft(): Status
    {
        return new self(LanguageStatusEnum::Draft);
    }

    public function get(): string
    {
        return $this->status->value;
    }

    public function compare(Status $status): bool
    {
        return $this->get() === $status->get();
    }

    public function isActive(): bool
    {
        return $this->status->value === LanguageStatusEnum::Active->value;
    }

    public function isDraft(): bool
    {
        return $this->status->value === LanguageStatusEnum::Draft->value;
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
