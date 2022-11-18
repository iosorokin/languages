<?php

namespace Domain\Core\Language\Base\Control\Query;

use Domain\Core\Language\Base\Model\Collection\ReadonlyLanguageCollection;
use Domain\Core\Language\Base\Repository\LanguageRepository;

class GetLanguagesHandler
{
    public function __construct(
        private LanguageRepository $repository,
    ) {}

    public function __invoke(GetLanguages $query): ReadonlyLanguageCollection
    {
        $dtoList = $this->repository->get($query);

        return $languages;
    }
}
