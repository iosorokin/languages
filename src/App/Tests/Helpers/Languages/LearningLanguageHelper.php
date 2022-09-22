<?php

declare(strict_types=1);

namespace App\Tests\Helpers\Languages;

use App\Contracts\Presenters\Languages\Learning\LearnRealLanguagePresenter;
use App\Contracts\Structures\LearnerStructure;
use Core\Test\Helper;
use Modules\Personal\Auth\Contexts\ClientContext;

final class LearningLanguageHelper extends Helper
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
