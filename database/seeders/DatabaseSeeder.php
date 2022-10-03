<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Education\Dictionary\Tests\DictionarySeeder;
use Modules\Education\Rules\Tests\RuleSeeder;
use Modules\Education\Source\Tests\SourceSeeder;
use Modules\Languages\Tests\LanguageHelper;
use Modules\Languages\Tests\LanguageSeeder;
use Modules\Personal\User\Entities\User;
use Modules\Personal\User\Tests\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            LanguageSeeder::class,
            SourceSeeder::class,
            DictionarySeeder::class,
            RuleSeeder::class,
        ]);
    }
}
