<?php

declare(strict_types=1);

namespace App\Education\Language\Root\Control\Cases;

use App\Exceptions\EntityNotFound;
use App\Education\Language\Root\Control\Cases\Dto\GetLanguageDto;
use App\Education\Language\Root\Domain\Model\Language;
use App\Education\Language\Root\Repository\Support\GetLanguageOrFail;

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
