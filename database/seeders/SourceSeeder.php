<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Education\Source\Tests\SourceHelper;

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
