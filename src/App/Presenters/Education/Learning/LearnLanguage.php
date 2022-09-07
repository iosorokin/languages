<?php

namespace App\Presenters\Education\Learning;

use Modules\Education\Learning\Actions\CreateLearning;

class LearnLanguage
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
