<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Model\Collection;

use App\Base\Collections\ReadonlyCollection;

class ReadonlyLanguageCollectionImp implements ReadonlyLanguageCollection
{
    public function __construct(
        private ReadonlyCollection $collection
    ) {}
}
