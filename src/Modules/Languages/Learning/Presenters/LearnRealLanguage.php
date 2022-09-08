<?php

namespace Modules\Languages\Learning\Presenters;

use App\Contracts\Client;
use App\Contracts\Presenters\Languages\Learning\LearnRealLanguagePresenter;
use App\Contracts\Structures\Languages\LearningLanguageStructure;
use App\Contracts\Structures\Personal\LearnerStructure;
use Illuminate\Support\Arr;
use Modules\Languages\Learning\Dto\CreateLearningDto;
use Modules\Languages\Real\Presenters\GetRealLanguage;
use Webmozart\Assert\Assert;

class LearnRealLanguage implements LearnRealLanguagePresenter
{
    public function __construct(
        private GetRealLanguage $getRealLanguage,
        private LearnLanguage $learnLanguage,
    ) {}

    public function __invoke(Client $client, array $attributes): LearningLanguageStructure
    {
        Assert::implementsInterface($client, LearnerStructure::class);
        /** @var LearnerStructure $client */
        $language = ($this->getRealLanguage)(Arr::get($attributes, 'id'));
        $dto = CreateLearningDto::new($client, $language, $attributes);
        $learning = ($this->learnLanguage)($dto);

        return $learning->structure;
    }
}
