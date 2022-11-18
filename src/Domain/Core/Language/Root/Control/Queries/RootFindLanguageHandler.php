<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Control\Queries;

use App\Exceptions\EntityNotFound;
use App\Model\Roles\Root;
use Domain\Core\Language\Base\Model\Aggregate\ReadonlyLanguage;
use Domain\Core\Language\Base\Support\GetLanguageOrFail;

class RootFindLanguageHandler
{
    public function __construct(
        private GetLanguageOrFail $getLanguageOrFail,
    ) {}

    /**
     * @throws EntityNotFound
     */
    public function __invoke(Root $root, RootFindLanguageImp $query): ReadonlyLanguage
    {
        $language = ($this->getLanguageOrFail)($query);

        return $language;
    }
}
