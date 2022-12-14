<?php

declare(strict_types=1);

namespace Domain\Education\Language\Root\Test;

use Domain\Education\Language\Root\Control\Cases\Dto\CreateLanguageDto;
use Domain\Education\Language\Root\Domain\Model\Language;
use Domain\Education\Language\Root\Domain\Model\LanguageFactory;
use Illuminate\Support\Str;

final class LanguageTestHelper
{
    public static function generateCreateAttributes(array $overwrite = []): array
    {
        $attributes = [
            'owner_id' => 1,
            'code' => Str::random(4),
            'name' => Str::random(),
            'native_name' => Str::random(),
        ];

        return $overwrite + $attributes;
    }

    public static function createEntity(array $overwrite = []): Language
    {
        $attributes = self::generateCreateAttributes($overwrite);
        $dto = CreateLanguageDto::new($attributes);

        return LanguageFactory::new($dto);
    }
}
