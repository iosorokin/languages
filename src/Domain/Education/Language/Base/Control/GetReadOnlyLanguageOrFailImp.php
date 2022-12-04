<?php

declare(strict_types=1);

namespace Domain\Education\Language\Base\Control;

use Domain\Exceptions\EntityNotFound;
use Domain\Education\Language\Base\Model\Aggregate\Language;
use Domain\Education\Language\Base\Model\Aggregate\LanguageFactory;
use Domain\Education\Language\Base\Repository\LanguageRepository;
use Domain\Education\Language\Base\Repository\Query\Find\FindLanguage;

final class GetReadOnlyLanguageOrFailImp
{
    public function __construct(
        private LanguageRepository $repository,
    ){}

    public function __invoke(FindLanguage $findLanguage): Language
    {
        $structure = $this->repository->find($findLanguage);
        if (! $structure) {
            throw new EntityNotFound('code', $findLanguage->get());
        }
        $language = LanguageFactory::restore($structure);

        return $language;
    }
}
