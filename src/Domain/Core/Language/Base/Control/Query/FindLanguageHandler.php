<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Control\Query;

use App\Exceptions\EntityNotFound;
use Domain\Core\Language\Base\Model\Aggregate\ReadonlyLanguage;
use Domain\Core\Language\Base\Support\GetReadOnlyLanguageOrFail;

class FindLanguageHandler
{
    public function __construct(
        private GetReadOnlyLanguageOrFail $getLanguageOrFail,
    ) {}

    /**
     * @throws EntityNotFound
     */
    public function __invoke(FindLanguage $query): ReadonlyLanguage
    {
        $language = ($this->getLanguageOrFail)($query);

        return $language;
    }
}
