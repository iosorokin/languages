<?php

declare(strict_types=1);

namespace Core\Domain\Models\Value;

use Core\Domain\Models\Enum\SourceTypeEnum;

final class SourceTypeImp implements SourceType
{
    private function __construct(
        private SourceTypeEnum $type
    ) {}

    public static function new(string $type): SourceType
    {
        $enum = SourceTypeEnum::tryFrom($type);
        if (! $enum) {
            return InvalidSourceType::new([
                sprintf(
                    'Source type %s is not valid. Allow types: %s',
                    $type,
                    implode('|', SourceTypeEnum::cases())
                )
            ]);
        }

        return new self($enum);
    }

    public static function movie(): SourceType
    {
        return new self(SourceTypeEnum::Movie);
    }

    public static function song(): SourceType
    {
        return new self(SourceTypeEnum::Song);
    }

    public function get(): string
    {
        return $this->type->value;
    }

    public function isMovie(): bool
    {
        return $this->type->value === SourceTypeEnum::Movie->value;
    }

    public function isSong(): bool
    {
        return $this->type->value === SourceTypeEnum::Song->value;
    }
}
