<?php

namespace Domain\Root\Core\Language\Control\Commands;

use App\Model\Roles\Root;
use App\Model\Values\Language\Code\CodeImp;
use App\Model\Values\Language\Name\NameImp;
use App\Model\Values\Language\NativeName\NativeNameImp;
use Domain\Root\Core\Language\Control\Queries\RootFindLanguage;
use Domain\Root\Core\Language\Model\Aggregates\RootLanguage;
use Domain\Root\Core\Language\Repository\RootLanguageRepository;
use Domain\Root\Core\Language\Support\RootGetLanguageOrFail;

class RootUpdateLanguageHandler
{
    public function __construct(
        private RootGetLanguageOrFail  $getLanguageOrFail,
        private RootLanguageRepository $repository,
    ) {}

    public function __invoke(Root $root, RootUpdateLanguage $command): void
    {
        $query = new RootFindLanguage($command->id());
        $language = ($this->getLanguageOrFail)($query);
        $this->updateLanguage($language, $command);
        $this->repository->update($language);
    }

    private function updateLanguage(RootLanguage $language, RootUpdateLanguage $dto): void
    {
        $language->changeName(NameImp::new($dto->name()));
        $language->changeNativeName(NativeNameImp::new($dto->nativeName()));
        $language->changeCode(CodeImp::new($dto->code()));
    }
}
