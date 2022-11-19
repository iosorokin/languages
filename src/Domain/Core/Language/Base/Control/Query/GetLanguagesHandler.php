<?php

namespace Domain\Core\Language\Base\Control\Query;

use Domain\Core\Language\Base\Model\Aggregate\LanguageFactory;
use Domain\Core\Language\Base\Model\Collection\LanguageCollection;
use Domain\Core\Language\Base\Model\Collection\LanguageCollectionImp;
use Domain\Core\Language\Base\Repository\LanguageRepository;

class GetLanguagesHandler
{
    public function __construct(
        private LanguageRepository $repository,
    ) {}

    public function __invoke(GetLanguages $query): LanguageCollection
    {
        $structures = $this->repository->get($query);
        $collection = new LanguageCollectionImp($structures);
        $collection->addWrapper(function (array $item) {
            $structure = $i
            return LanguageFactory::restore()
        });

        return $collection;
    }
}
