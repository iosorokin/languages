<?php

namespace Domain\Core\Language\Root\Control\Commands;

use App\Base\Model\Roles\Root;
use Domain\Core\Language\Base\Repository\Query\Find\FindByCode;
use Domain\Core\Language\Root\Repository\RootLanguageRepository;
use Domain\Core\Language\Root\Support\GetLanguageOrFail;

class DeleteLanguageHandler
{
    public function __construct(
        private RootLanguageRepository $repository,
        private GetLanguageOrFail      $getLanguageOrFail,
    ) {}

    public function __invoke(Root $root, DeleteLanguage $command): void
    {
        $language = ($this->getLanguageOrFail)(new FindByCode($command->code()));
        $this->repository->delete($language->code());
    }
}
