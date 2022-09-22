<?php

namespace App\Contracts\Presenters\Languages\Learning;

use App\Contracts\Contexts\Client;
use App\Contracts\Structures\LearningLanguageStructure;

interface LearnRealLanguagePresenter
{
    public function __invoke(Client $client, array $attributes): LearningLanguageStructure;
}
