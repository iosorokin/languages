<?php

namespace Domain\Core\Language\Root\Control\Commands;

use App\Controll\Language\Root\UpdateLanguageCommand;
use Domain\Core\Language\Base\Model\Aggregate\Language;
use Domain\Core\Language\Base\Model\Value\Code\CodeImp;
use Domain\Core\Language\Base\Model\Value\Name\NameImp;
use Domain\Core\Language\Base\Model\Value\NativeName\NativeNameImp;
use Domain\Core\Language\Base\Repository\Query\Find\FindByCode;
use Domain\Core\Language\Root\Repository\RootLanguageRepository;
use Domain\Core\Language\Root\Support\GetLanguageOrFail;
use Infrastructure\Database\Structures\Language\LanguageStructureImp;

class UpdateLanguageHandler
{
    public function __construct(
        private GetLanguageOrFail      $getLanguageOrFail,
        private RootLanguageRepository $repository,
    ) {}

    public function __invoke(UpdateLanguageCommand $command): void
    {
        $query = new FindByCode($command->code());
        $language = ($this->getLanguageOrFail)($query);
        $this->updateLanguage($language, $command);
        $structure = LanguageStructureImp::newFromEntity($language);
        $this->repository->update($structure);
    }

    private function updateLanguage(Language $language, UpdateLanguageCommand $dto): void
    {
        $language->changeName(NameImp::new($dto->name()));
        $language->changeNativeName(NativeNameImp::new($dto->nativeName()));
        $language->changeCode(CodeImp::new($dto->code()));
    }
}
