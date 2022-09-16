<?php

namespace Database\Seeders;

use App\Tests\Helpers\languages\RealLanguageHelper;
use Illuminate\Database\Seeder;

class RealLanguageSeeder extends Seeder
{
    private const COUNT_LANGUAGES = 100;

    public function run()
    {
        RealLanguageHelper::new()->create(self::COUNT_LANGUAGES)->current();
    }
}
