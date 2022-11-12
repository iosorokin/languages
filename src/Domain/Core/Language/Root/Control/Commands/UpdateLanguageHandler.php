<?php

namespace Domain\Core\Language\Root\Control\Commands;

use App\Model\Roles\Root;
use App\Model\Values\Language\Code\CodeImp;
use App\Model\Values\Language\Name\NameImp;
use App\Model\Values\Language\NativeName\NativeNameImp;
use Domain\Core\Language\Root\Model\Aggregates\Language;
use Domain\Core\Language\Root\Repository\LanguageRepository;
use Domain\Core\Language\Root\Support\GetLanguageOrFail;

class UpdateLanguageHandler
{
    public function __construct(
        private GetLanguageOrFail  $getLanguageOrFail,
        private LanguageRepository $repository,
    ) {}

    public function __invoke(Root $root, UpdateLanguage $command): void
    {
        $language = ($this->getLanguageOrFail)($command->id());
        $this->updateLanguage($language, $command);
        $this->repository->update($language);
    }

    private function updateLanguage(Language $language, UpdateLanguage $dto): void
    {
        $language->changeName(NameImp::new($dto->name()));
        $language->changeNativeName(NativeNameImp::new($dto->nativeName()));
        $language->changeCode(CodeImp::new($dto->code()));
    }
}
