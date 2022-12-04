<?php

namespace Domain\Education\Language\Root\Control\Cases;

use Domain\Education\Language\Base\Model\Value\Code\CodeImp;
use Domain\Education\Language\Base\Model\Value\Name\NameImp;
use Domain\Education\Language\Base\Model\Value\NativeName\NativeNameImp;
use Domain\Education\Language\Root\Control\Cases\Dto\GetLanguageDto;
use Domain\Education\Language\Root\Control\Cases\Dto\UpdateLanguageDto;
use Domain\Education\Language\Root\Domain\Model\Language;
use Domain\Education\Language\Root\Infrastructure\Database\LanguageRepository;
use Domain\Education\Language\Root\Repository\Support\GetLanguageOrFail;

class UpdateLanguageHandler
{
    public function __construct(
        private GetLanguageOrFail  $getLanguageOrFail,
        private LanguageRepository $repository,
    ) {}

    public function __invoke(UpdateLanguageDto $dto): void
    {
        $findDto = new GetLanguageDto(value: $dto->code());
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
