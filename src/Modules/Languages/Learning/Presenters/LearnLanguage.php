<?php

namespace Modules\Languages\Learning\Presenters;

use App\Contracts\Learnable;
use App\Contracts\Presenters\Languages\Learning\LearnLanguagePresenter;
use Exception;
use Illuminate\Support\Arr;
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

    private function getLanguage(array $attributes): Learnable
    {
        $id = Arr::get($attributes, 'id', fn() => throw new Exception('Ff'));
    }
}
