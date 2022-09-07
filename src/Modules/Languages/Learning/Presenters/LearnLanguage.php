<?php

namespace Modules\Languages\Learning\Presenters;

use App\Contracts\Presenters\Languages\Learning\LearnLanguagePresenter;
use Modules\Languages\Learning\Actions\CreateLearning;

class LearnLanguage implements LearnLanguagePresenter
{
    public function __construct(
        private CreateLearning $createLearning,
    )
    {
    }

    public function __invoke(array $attributes)
    {

    }
}
