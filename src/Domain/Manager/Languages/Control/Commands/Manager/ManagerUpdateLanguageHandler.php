<?php

namespace Domain\Core\Languages\Model\Manager\Commands\Manager;

use App\Roles\ContentManager;
use App\Values\Language\Code\CodeImp;
use App\Values\Language\Name\NameImp;
use App\Values\Language\NativeName\NativeNameImp;
use Domain\Core\Languages\Model\Manager\Aggregates\Manager\ManagerLanguage;
use Domain\Core\Languages\Model\Manager\ManagerLanguageRepository;
use Domain\Core\Languages\Model\Manager\Queries\Mixins\GetLanguage;

class ManagerUpdateLanguageHandler
{
    public function __construct(
        private GetLanguage               $getLanguage,
        private ManagerLanguageRepository $repository,
    ) {}

    public function __invoke(ContentManager $manager, UpdateLanguage $dto): void
    {
        $language = $this->getLanguage->getOrFail($dto->id());
        $this->updateLanguage($language, $dto);
        $this->repository->update($language);
    }

    private function updateLanguage(ManagerLanguage $language, UpdateLanguage $dto): void
    {
        $language->changeName(NameImp::new($dto->name()));
        $language->changeNativeName(NativeNameImp::new($dto->nativeName()));
        $language->changeCode(CodeImp::new($dto->code()));
    }
}
