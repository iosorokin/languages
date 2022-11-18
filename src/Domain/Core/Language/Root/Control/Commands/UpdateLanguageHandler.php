<?php

namespace Domain\Core\Language\Root\Control\Commands;

use App\Model\Roles\Root;
use Domain\Core\Language\Base\Support\GetLanguageOrFail;
use Domain\Core\Language\Base\Model\Value\Code\CodeImp;
use Domain\Core\Language\Base\Model\Value\Name\NameImp;
use Domain\Core\Language\Base\Model\Value\NativeName\NativeNameImp;
use Domain\Core\Language\Root\Control\Queries\RootFindLanguageImp;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguageImp;
use Domain\Core\Language\Root\Repository\RootLanguageRepository;

class UpdateLanguageHandler
{
    public function __construct(
        private GetLanguageOrFail      $getLanguageOrFail,
        private RootLanguageRepository $repository,
    ) {}

    public function __invoke(Root $root, UpdateLanguage $command): void
    {
        $query = new RootFindLanguageImp($command->id());
        $language = ($this->getLanguageOrFail)($query);
        $this->updateLanguage($language, $command);
        $this->repository->update($language);
    }

    private function updateLanguage(RootLanguageImp $language, UpdateLanguage $dto): void
    {
        $language->changeName(NameImp::new($dto->name()));
        $language->changeNativeName(NativeNameImp::new($dto->nativeName()));
        $language->changeCode(CodeImp::new($dto->code()));
    }
}
