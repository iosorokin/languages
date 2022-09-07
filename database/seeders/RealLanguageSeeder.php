<?php

namespace Database\Seeders;

use App\Presenters\Languages\Real\NewRealLanguage;
use Illuminate\Database\Seeder;
use Tests\Actions\Languages\RealLanguageAction;

class RealLanguageSeeder extends Seeder
{
    use RealLanguageAction;

    private const COUNT_LANGUAGES = 100;

    public function run()
    {
        for ($i = 0; $i < self::COUNT_LANGUAGES; $i++) {
            $attributes = $this->getRealLanguagesAttributes();
            $presenter = app()->get(NewRealLanguage::class);
            $presenter($attributes);
        }
    }
}
