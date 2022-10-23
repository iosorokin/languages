<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters\Guest\Items;

use Modules\Domain\Sources\Authorization\SourceAuthorizeUser;
use Modules\Domain\Sources\Presenters\Internal\GetSourcePresenter;

final class GuestIndexSourceItems implements GuestIndexSourceItemsPresenter
{
    public function __construct(
        private GetSourcePresenter  $getSource,
        private SourceAuthorizeUser $authorize,
    ) {}

    public function __invoke(int $sourceId, array $attributes)
    {
        $source = $this->getSource->getOrThrowNotFound($sourceId);
        $this->authorize->canIndex();


    }
}
