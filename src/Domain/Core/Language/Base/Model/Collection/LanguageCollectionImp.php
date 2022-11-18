<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Model\Collection;

use App\Base\Collections\Collection;

final class LanguageCollectionImp extends ReadonlyLanguageCollectionImp implements LanguageCollection
{
    public function __construct(
        private Collection $collection
    ) {
        parent::__construct($this->collection);
    }
}
