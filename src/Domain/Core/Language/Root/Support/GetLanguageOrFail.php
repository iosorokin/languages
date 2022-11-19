<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Support;

use Domain\Core\Language\Base\Model\Aggregate\Language;
use Domain\Core\Language\Base\Repository\Query\Find\FindLanguage;
use Domain\Core\Language\Base\Support\GetReadOnlyLanguageOrFail;

final class GetLanguageOrFail
{
    public function __construct(
        private GetReadOnlyLanguageOrFail $getLanguageOrFail,
    ){}

    public function __invoke(FindLanguage $query): Language
    {
        /** @var Language $language */
        $language = ($this->getLanguageOrFail)($query);

        return $language;
    }
}
