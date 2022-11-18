<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Control\Query;

use App\Exceptions\EntityNotFound;
use Domain\Core\Language\Base\Model\Aggregate\ReadonlyLanguage;
use Domain\Core\Language\Base\Support\GetLanguageOrFail;

class FindLanguageHandler
{
    public function __construct(
        private GetLanguageOrFail $getLanguageOrFail,
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
