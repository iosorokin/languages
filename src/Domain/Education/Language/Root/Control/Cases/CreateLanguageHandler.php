<?php

namespace Domain\Education\Language\Root\Control\Cases;

use Domain\Education\Language\Root\Control\Cases\Dto\CreateLanguageDto;
use Domain\Education\Language\Root\Domain\Model\Language;
use Domain\Education\Language\Root\Domain\Model\LanguageFactory;
use Domain\Education\Language\Root\Infrastructure\Database\LanguageRepository;
use Domain\Education\Language\Root\Infrastructure\Database\Structures\WriteLanguageStructure;

class CreateLanguageHandler
{
    public function __construct(
        private LanguageRepository $repository,
    ) {}

    public function __invoke(CreateLanguageDto $dto): Language
    {
        $language = LanguageFactory::new($dto);
        $structure = WriteLanguageStructure::createFromEntity($language);
        $this->repository->add($structure);

        return $language;
    }
}
