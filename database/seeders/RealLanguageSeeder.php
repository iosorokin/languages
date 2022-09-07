<?php

namespace Database\Seeders;

use Core\Test\Actions\Languages\RealLanguageAction;
use Illuminate\Database\Seeder;
use Modules\Languages\Real\Presenters\CreateRealLanguage;

class RealLanguageSeeder extends Seeder
{
    use RealLanguageAction;

    private const COUNT_LANGUAGES = 100;

    public function run()
    {
        for ($i = 0; $i < self::COUNT_LANGUAGES; $i++) {
            $attributes = $this->getRealLanguagesAttributes();
            $presenter = app()->get(CreateRealLanguage::class);
            $presenter($attributes);
        }
    }
}
