<?php

namespace Domain\Core\Language\Root\Control\Commands;

use Domain\Core\Language\Base\Model\Aggregate\ReadonlyLanguage;
use Domain\Core\Language\Root\Model\RootLanguageFactory;
use Domain\Core\Language\Root\Repository\RootLanguageRepository;
use Infrastructure\Database\Structures\Language\LanguageStructureImp;

class CreateLanguageHandler
{
    public function __construct(
        private RootLanguageRepository $repository,
    ) {}

    public function __invoke(CreateLanguage $command): ReadonlyLanguage
    {
        $language = RootLanguageFactory::new($command);
        $structure = LanguageStructureImp::newFromEntity($language);
        $this->repository->add($structure);

        return $language;
    }
}
