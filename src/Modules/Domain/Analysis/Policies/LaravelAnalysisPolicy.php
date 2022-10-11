<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Policies;

use Modules\Domain\Sentences\Entities\Sentence;
use Modules\Domain\Sources\Policies\SourcePolicy;
use Modules\Personal\Auth\Contexts\Client;

final class LaravelAnalysisPolicy implements AnalysisPolicy
{
    public function __construct(
        private SourcePolicy $sourcePolicy,
    ) {}

    public function canCreate(Client $client, Sentence $sentence): void
    {
        $source = $sentence->getSource();
        $this->sourcePolicy->canTakeToWork($client, $source);
    }
}
