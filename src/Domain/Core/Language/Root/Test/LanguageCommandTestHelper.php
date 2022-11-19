<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Test;

use App\Controll\Language\Root\BaseLanguageCommandImp;
use App\Controll\Language\Root\CreateLanguageImp;
use Domain\Core\Language\Base\Test\LanguageAttributesTestHelper;

final class LanguageCommandTestHelper
{
    public static function create(array $overwrite = []): CreateLanguageImp
    {
        $attributes = $overwrite + LanguageAttributesTestHelper::generate();
        $base = new BaseLanguageCommandImp(
            name: $attributes['name'],
            nativeName: $attributes['name'],
            code: $attributes['code'],
        );

        return new CreateLanguageImp(
            base: $base,
        );
    }
}
