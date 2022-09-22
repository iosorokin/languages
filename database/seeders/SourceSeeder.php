<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Tests\Helpers\Education\SourceHelper;
use Illuminate\Database\Seeder;

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
