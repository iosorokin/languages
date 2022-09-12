<?php

namespace App\Contracts\Presenters\Languages\Learning;

use App\Contracts\Contexts\Client;
use App\Contracts\Structures\Languages\LearningLanguageStructure;
use App\Contracts\Structures\Personal\LearnerStructure;

interface LearnRealLanguagePresenter
{
    public function __invoke(Client $client, array $attributes): LearningLanguageStructure;
}
