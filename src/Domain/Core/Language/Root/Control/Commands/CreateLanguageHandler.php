<?php

namespace Domain\Core\Language\Root\Control\Commands;

use App\Model\Roles\Root;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguageImp;
use Domain\Core\Language\Root\Repository\RootLanguageRepository;

class CreateLanguageHandler
{
    public function __construct(
        private RootLanguageRepository $repository,
    ) {}

    public function __invoke(Root $root, CreateLanguage $dto): int
    {
        $language = new RootLanguageImp::new($root, $dto);
        $language->commit($this->repository);

        return $language->id()->toInt();
    }
}
