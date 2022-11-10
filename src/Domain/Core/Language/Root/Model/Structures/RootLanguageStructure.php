<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Model\Structures;

use Domain\Core\Language\Base\Model\Structures\LanguageStructure;

final class RootLanguageStructure extends LanguageStructure
{
    public static function new(array $attributes): self
    {
        $structure = new self(
            id: $attributes['id'],
            owner: $attributes['owner'],
            name: $attributes['name'],
            nativeName: $attributes['native_name'],
            code: $attributes['code'],
            isActive: $attributes['is_active'],
            createdAt: $attributes['created_at'],
        );

        return $structure;
    }
}
