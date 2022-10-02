<?php

namespace Modules\Languages\Tests;

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    public const COUNT_LANGUAGES = 100;

    public function run()
    {
        LanguageHelper::new()->create(self::COUNT_LANGUAGES)
            ->current();
    }
}
