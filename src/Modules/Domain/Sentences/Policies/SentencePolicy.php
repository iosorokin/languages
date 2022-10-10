<?php

namespace Modules\Domain\Sentences\Policies;

use Modules\Domain\Sentences\Entities\Sentence;
use Modules\Domain\Sources\Entities\Source;
use Modules\Personal\Auth\Contexts\Client;

interface SentencePolicy
{
    public function canCreate(Client $client, Source $source): void;

    public function canDelete(Client $client, Sentence $sentence): void;
}
