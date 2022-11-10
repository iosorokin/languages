<?php

namespace Domain\Core\Language\Root\Control\Commands;

use App\Model\Roles\ContentManager;
use App\Model\Values\Language\Code\CodeImp;
use App\Model\Values\Language\Name\NameImp;
use App\Model\Values\Language\NativeName\NativeNameImp;
use Domain\Core\Languages\Model\Manager\Aggregates\Manager\ManagerLanguage;
use Domain\Core\Languages\Model\Manager\ManagerLanguageRepository;
use Domain\Core\Languages\Model\Manager\Queries\Mixins\GetLanguage;

class UpdateLanguageHandler
{
    public function __construct(
        private GetLanguage               $getLanguage,
        private ManagerLanguageRepository $repository,
    ) {}

    public function __invoke(ContentManager $manager, RootUpdateLanguage $dto): void
    {
        $language = $this->getLanguage->getOrFail($dto->id());
        $this->updateLanguage($language, $dto);
        $this->repository->update($language);
    }

    private function updateLanguage(ManagerLanguage $language, RootUpdateLanguage $dto): void
    {
        $language->changeName(NameImp::new($dto->name()));
        $language->changeNativeName(NativeNameImp::new($dto->nativeName()));
        $language->changeCode(CodeImp::new($dto->code()));
    }
}
