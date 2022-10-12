<?php

namespace Modules\Domain\Analysis\Policies;

use Modules\Domain\Sentences\Structures\Sentence;
use Modules\Personal\Auth\Contexts\Client;

interface AnalysisPolicy
{
    public function canCreate(Client $client, Sentence $sentence): void;
}
