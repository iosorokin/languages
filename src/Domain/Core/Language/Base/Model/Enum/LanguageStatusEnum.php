<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Model\Enum;

enum LanguageStatusEnum: string
{
    case Active = 'active';

    case Draft = 'draft';

    public static function castCases(): array
    {
        return [
            self::Active->value,
            self::Draft->value,
        ];
    }
}
