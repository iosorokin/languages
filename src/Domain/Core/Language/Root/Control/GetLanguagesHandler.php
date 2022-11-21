<?php

namespace Domain\Core\Language\Root\Control;

use Domain\Core\Language\Root\Control\Dto\GetLanguagesDto;
use Domain\Core\Language\Root\Model\LanguageCollection;
use Domain\Core\Language\Root\Repository\LanguageRepository;

class GetLanguagesHandler
{
    public function __construct(
        private LanguageRepository $repository,
    ) {}

    public function __invoke(GetLanguagesDto $dto): LanguageCollection
    {
        return $this->repository->get($dto);
    }
}
