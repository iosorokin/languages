<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Test;

use Domain\Core\Language\Base\Test\LanguageAttributesTestHelper;
use Domain\Core\Language\Root\Control\BaseLanguageCommandImp;
use Domain\Core\Language\Root\Control\Dto\CreateLanguageDto;

final class LanguageCommandTestHelper
{
    public static function create(array $overwrite = []): CreateLanguageDto
    {
        $attributes = $overwrite + LanguageAttributesTestHelper::generate();
        $base = new BaseLanguageCommandImp(
            name: $attributes['name'],
            nativeName: $attributes['name'],
            code: $attributes['code'],
        );

        return new CreateLanguageDto(
            base: $base,
        );
    }
}
