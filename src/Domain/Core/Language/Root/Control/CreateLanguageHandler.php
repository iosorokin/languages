<?php

namespace Domain\Core\Language\Root\Control;

use Domain\Core\Language\Root\Control\Dto\CreateLanguageDto;
use Domain\Core\Language\Root\Model\Language;
use Domain\Core\Language\Root\Repository\LanguageRepository;

class CreateLanguageHandler
{
    public function __construct(
        private LanguageRepository $repository,
    ) {}

    public function __invoke(CreateLanguageDto $dto): Language
    {
        $language = Language::new($dto);
        $this->repository->add($language);

        return $language;
    }
}
