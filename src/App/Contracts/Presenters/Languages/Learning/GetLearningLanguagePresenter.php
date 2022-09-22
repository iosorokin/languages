<?php

declare(strict_types=1);

namespace App\Contracts\Presenters\Languages\Learning;

use App\Contracts\Contexts\Client;
use App\Contracts\Structures\LearningLanguageStructure;

interface GetLearningLanguagePresenter
{
    public function __invoke(Client $client, int $id): LearningLanguageStructure;
}
