<?php

namespace Domain\Core\Language\Root\Control\Commands;

use App\Model\Roles\Root;
use Domain\Core\Language\Root\Repository\LanguageRepository;
use Domain\Core\Language\Root\Support\GetLanguageOrFail;

class DeleteLanguageHandler
{
    public function __construct(
        private LanguageRepository $repository,
        private GetLanguageOrFail  $getLanguageOrFail,
    ) {}

    public function __invoke(Root $root, DeleteLanguage $command): void
    {
        $language = ($this->getLanguageOrFail)($command->id());
        $language->delete($this->repository);
    }
}
