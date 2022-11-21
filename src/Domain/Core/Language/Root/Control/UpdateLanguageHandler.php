<?php

namespace Domain\Core\Language\Root\Control;

use Domain\Core\Language\Base\Model\Value\Code\CodeImp;
use Domain\Core\Language\Base\Model\Value\Name\NameImp;
use Domain\Core\Language\Base\Model\Value\NativeName\NativeNameImp;
use Domain\Core\Language\Root\Control\Dto\FindLanguageDto;
use Domain\Core\Language\Root\Control\Dto\UpdateLanguageDto;
use Domain\Core\Language\Root\Model\Language;
use Domain\Core\Language\Root\Repository\LanguageRepository;
use Domain\Core\Language\Root\Support\GetLanguageOrFail;

class UpdateLanguageHandler
{
    public function __construct(
        private GetLanguageOrFail  $getLanguageOrFail,
        private LanguageRepository $repository,
    ) {}

    public function __invoke(UpdateLanguageDto $dto): void
    {
        $findDto = new FindLanguageDto(value: $dto->code());
        $language = ($this->getLanguageOrFail)($findDto);
        $this->updateLanguage($language, $dto);
        $this->repository->update($language);
    }

    private function updateLanguage(Language $language, UpdateLanguageDto $dto): void
    {
        $language->changeName(NameImp::new($dto->name()));
        $language->changeNativeName(NativeNameImp::new($dto->nativeName()));
        $language->changeCode(CodeImp::new($dto->code()));
    }
}
