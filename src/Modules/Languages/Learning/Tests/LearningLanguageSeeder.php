<?php

declare(strict_types=1);

namespace Modules\Languages\Learning\Tests;

use Illuminate\Database\Seeder;
use Modules\Personal\Learner\Tests\LearnerHelper;

final class LearningLanguageSeeder extends Seeder
{
    public function run()
    {
        $learner = LearnerHelper::new()->getTestLearnerStructure();
        (LearningLanguageHelper::new())->learnLanguage($learner,['id' => 1]);
    }
}
