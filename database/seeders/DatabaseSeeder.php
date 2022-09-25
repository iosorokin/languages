<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Education\Source\Tests\SourceSeeder;
use Modules\Languages\Learning\Tests\LearningLanguageSeeder;
use Modules\Languages\Real\Tests\RealLanguageSeeder;
use Modules\Personal\Employers\Tests\EmployerSeeder;
use Modules\Personal\Learner\Tests\LearnerSeeder;

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
            EmployerSeeder::class,
            LearnerSeeder::class,
            RealLanguageSeeder::class,
            LearningLanguageSeeder::class,
            SourceSeeder::class,
        ]);
    }
}
