<?php

namespace Modules\Languages\Learning\Presenters;

use App\Contracts\Contexts\Client;
use Modules\Languages\Learning\Structures\LearningLanguageStructure;

interface LearnRealLanguagePresenter
{
    public function __invoke(Client $client, array $attributes): LearningLanguageStructure;
}
