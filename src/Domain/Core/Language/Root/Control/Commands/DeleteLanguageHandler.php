<?php

namespace Domain\Core\Language\Root\Control\Commands;

use App\Model\Roles\Root;
use Domain\Core\Language\Base\Support\GetLanguageOrFail;
use Domain\Core\Language\Root\Control\Queries\RootFindLanguageImp;
use Domain\Core\Language\Root\Repository\RootLanguageRepository;

class DeleteLanguageHandler
{
    public function __construct(
        private RootLanguageRepository $repository,
        private GetLanguageOrFail      $getLanguageOrFail,
    ) {}

    public function __invoke(Root $root, DeleteLanguage $command): void
    {
        $query = new RootFindLanguageImp($command->id());
        $language = ($this->getLanguageOrFail)($query);
        $language->delete($this->repository);
    }
}
