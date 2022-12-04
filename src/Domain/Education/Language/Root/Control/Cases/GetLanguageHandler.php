<?php

declare(strict_types=1);

namespace Domain\Education\Language\Root\Control\Cases;

use Domain\Exceptions\EntityNotFound;
use Domain\Education\Language\Root\Control\Cases\Dto\GetLanguageDto;
use Domain\Education\Language\Root\Domain\Model\Language;
use Domain\Education\Language\Root\Repository\Support\GetLanguageOrFail;

class GetLanguageHandler
{
    public function __construct(
        private GetLanguageOrFail $getLanguageOrFail,
    ) {}

    /**
     * @throws EntityNotFound
     */
    public function __invoke(GetLanguageDto $dto): Language
    {
        $language = ($this->getLanguageOrFail)($dto);

        return $language;
    }
}
