<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Tests\Helpers\Languages\LearningLanguageHelper;
use App\Tests\Helpers\Personal\LearnerHelper;
use Illuminate\Database\Seeder;

final class LearningLanguageSeeder extends Seeder
{
    public function run()
    {
        $learner = LearnerHelper::new()->getTestLearnerStructure();
        (LearningLanguageHelper::new())->learnLanguage($learner,['id' => 1]);
    }
}
