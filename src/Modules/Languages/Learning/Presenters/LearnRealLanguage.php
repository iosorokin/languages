<?php

namespace Modules\Languages\Learning\Presenters;

use App\Contracts\Contexts\Client;
use App\Contracts\Presenters\Languages\Learning\LearnRealLanguagePresenter;
use App\Contracts\Structures\LearningLanguageStructure;
use Illuminate\Support\Arr;
use Modules\Languages\Learning\Actions\LearnLanguage;
use Modules\Languages\Real\Presenters\GetRealLanguage;

class LearnRealLanguage implements LearnRealLanguagePresenter
{
    public function __construct(
        private GetRealLanguage $getRealLanguage,
        private LearnLanguage $learnLanguage,
    ) {}

    public function __invoke(Client $client, array $attributes): LearningLanguageStructure
    {
        $language = ($this->getRealLanguage)(Arr::get($attributes, 'id'));
        $learning = ($this->learnLanguage)($client->getStructure(), $language, $attributes);

        return $learning;
    }
}
