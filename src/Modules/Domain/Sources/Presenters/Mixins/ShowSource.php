<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters\Mixins;

use Modules\Domain\Sources\Authorization\SourceAuthorizeUser;
use Modules\Domain\Sources\Presenters\Internal\GetSourcePresenter;
use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\Auth\Contexts\Client;

final class ShowSource
{
    public function __construct(
        private GetSourcePresenter  $getSource,
        private SourceAuthorizeUser $authorize,
    ) {}

    public function __invoke(Client $client, int $sourceId): Source
    {
        $source = $this->getSource->getOrThrowNotFound($sourceId);
        $this->authorize->canShow($client, $source);

        return $source;
    }
}
