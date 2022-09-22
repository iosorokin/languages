<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Languages\Learning\Tests\LearningLanguageHelper;
use Modules\Personal\Learner\Tests\LearnerHelper;

final class LearningLanguageSeeder extends Seeder
{
    public function run()
    {
        $learner = LearnerHelper::new()->getTestLearnerStructure();
        (LearningLanguageHelper::new())->learnLanguage($learner,['id' => 1]);
    }
}
