<?php

declare(strict_types=1);

namespace Modules\Education\Source\Tests;

use Illuminate\Database\Seeder;
use Modules\Languages\Real\Tests\RealLanguageSeeder;

final class SourceSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= RealLanguageSeeder::COUNT_LANGUAGES; $i++) {
            SourceHelper::new()
                ->createRealLanguageSource($i);
        }
    }
}
