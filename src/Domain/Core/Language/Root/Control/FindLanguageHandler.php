<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Control;

use App\Exceptions\EntityNotFound;
use Domain\Core\Language\Root\Control\Dto\FindLanguageDto;
use Domain\Core\Language\Root\Model\Language;
use Domain\Core\Language\Root\Support\GetLanguageOrFail;

class FindLanguageHandler
{
    public function __construct(
        private GetLanguageOrFail $getLanguageOrFail,
    ) {}

    /**
     * @throws EntityNotFound
     */
    public function __invoke(FindLanguageDto $dto): Language
    {
        $language = ($this->getLanguageOrFail)($dto);

        return $language;
    }
}
