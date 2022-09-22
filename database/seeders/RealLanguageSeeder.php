<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Languages\Real\Tests\RealLanguageHelper;

class RealLanguageSeeder extends Seeder
{
    public const COUNT_LANGUAGES = 100;

    public function run()
    {
        RealLanguageHelper::new()->create(self::COUNT_LANGUAGES)
            ->current();
    }
}
