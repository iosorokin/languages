<?php

namespace Modules\Domain\Languages\Tests;

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    public function run()
    {
        $generator = LanguageHelper::new()->create(
            userId: 1,
            count: config('seed.languages.count')
        );
        foreach ($generator as $_) {}
    }
}
