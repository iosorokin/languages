<?php

namespace App\Education\Language\Root\Control\Cases;

use App\Education\Language\Root\Control\Cases\Dto\CreateLanguageDto;
use App\Education\Language\Root\Domain\Model\Language;
use App\Education\Language\Root\Domain\Model\LanguageFactory;
use App\Education\Language\Root\Infrastructure\Database\LanguageRepository;
use App\Education\Language\Root\Infrastructure\Database\Structures\WriteLanguageStructure;

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
