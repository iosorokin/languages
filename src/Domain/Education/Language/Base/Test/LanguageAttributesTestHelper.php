<?php

declare(strict_types=1);

namespace Domain\Education\Language\Base\Test;

use Domain\Education\Language\Base\Model\Enum\LanguageStatusEnum;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

final class LanguageAttributesTestHelper
{
    public static function generate(): array
    {
        return [
            'name' => Str::random(random_int(2, 32)),
            'native_name' => Str::random(random_int(2, 32)),
            'code' => Str::random(random_int(2, 4)),
        ];
    }

    public static function full(): array
    {
        $attributes = [
            'status' => Arr::random(LanguageStatusEnum::castCases()),
            'owner' => random_int(1, 1000),
            'created_at' => now(),
        ];

        return $attributes + self::generate();
    }
}
