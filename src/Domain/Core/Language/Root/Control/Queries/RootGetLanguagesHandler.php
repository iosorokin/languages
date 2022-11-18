<?php

namespace Domain\Core\Language\Root\Control\Queries;

use App\Model\Roles\Root;
use Domain\Core\Language\Base\Model\Collection\LanguageCollectionImp;
use Domain\Core\Language\Base\Model\Collection\ReadonlyLanguageCollection;
use Domain\Core\Language\Base\Repository\LanguageRepository;

class RootGetLanguagesHandler
{
    public function __construct(
        private LanguageRepository $repository,
    ) {}

    public function __invoke(Root $root, RootGetLanguages $query): ReadonlyLanguageCollection
    {
        $dtoList = $this->repository->get($query);
        $collection = new LanguageCollectionImp($dtoList);

        return $languages;
    }
}
