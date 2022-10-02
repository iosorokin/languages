<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Languages\Tests\LanguageSeeder;
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
//            SourceSeeder::class,
        ]);
    }
}
