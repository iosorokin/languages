<?php

declare(strict_types=1);

namespace Modules\Languages\Learning\Tests;

use Core\Test\Helpers\AppHelper;
use Core\Test\Helpers\Helper;
use Modules\Languages\Learning\Presenters\LearnRealLanguagePresenter;
use Modules\Personal\Auth\Contexts\ClientContext;
use Modules\Personal\Learner\Structures\LearnerStructure;

final class LearningLanguageHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'title' => $this->faker()->title(),
        ];
    }

    public function learnLanguage(LearnerStructure $learner, array $attributes = []): void
    {
        $attributes = $this->generateAttributes() + $attributes;

        $createLearningLanguage = app()->make(LearnRealLanguagePresenter::class);
        $createLearningLanguage(new ClientContext($learner), $attributes);
    }
}
