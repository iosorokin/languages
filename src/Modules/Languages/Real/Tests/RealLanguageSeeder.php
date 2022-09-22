<?php

namespace Modules\Languages\Real\Tests;

use Illuminate\Database\Seeder;

class RealLanguageSeeder extends Seeder
{
    public const COUNT_LANGUAGES = 100;

    public function run()
    {
        RealLanguageHelper::new()->create(self::COUNT_LANGUAGES)
            ->current();
    }
}