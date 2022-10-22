<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Policies;

use Modules\Domain\Sentences\Structures\Sentence;
use Modules\Domain\Sources\Authorization\AuthorizeSource;
use Modules\Personal\Auth\Contexts\Client;

final class LaravelAnalysisPolicy implements AnalysisPolicy
{
    public function __construct(
        private AuthorizeSource $sourcePolicy,
    ) {}

    public function canCreate(Client $client, Sentence $sentence): void
    {
        $source = $sentence->getSource();
        $this->sourcePolicy->canTakeToWork($client, $source);
    }
}
