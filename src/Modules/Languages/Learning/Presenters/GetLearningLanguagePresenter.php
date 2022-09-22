<?php

declare(strict_types=1);

namespace Modules\Languages\Learning\Presenters;

use App\Contracts\Contexts\Client;
use Modules\Languages\Learning\Structures\LearningLanguageStructure;

interface GetLearningLanguagePresenter
{
    public function __invoke(Client $client, int $id): LearningLanguageStructure;
}
