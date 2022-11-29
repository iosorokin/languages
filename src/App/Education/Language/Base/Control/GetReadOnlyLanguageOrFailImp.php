<?php

declare(strict_types=1);

namespace App\Education\Language\Base\Control;

use App\Exceptions\EntityNotFound;
use App\Education\Language\Base\Model\Aggregate\Language;
use App\Education\Language\Base\Model\Aggregate\LanguageFactory;
use App\Education\Language\Base\Repository\LanguageRepository;
use App\Education\Language\Base\Repository\Query\Find\FindLanguage;

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
