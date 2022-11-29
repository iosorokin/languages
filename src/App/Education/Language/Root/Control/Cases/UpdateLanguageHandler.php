<?php

namespace App\Education\Language\Root\Control\Cases;

use App\Education\Language\Base\Model\Value\Code\CodeImp;
use App\Education\Language\Base\Model\Value\Name\NameImp;
use App\Education\Language\Base\Model\Value\NativeName\NativeNameImp;
use App\Education\Language\Root\Control\Cases\Dto\GetLanguageDto;
use App\Education\Language\Root\Control\Cases\Dto\UpdateLanguageDto;
use App\Education\Language\Root\Domain\Model\Language;
use App\Education\Language\Root\Infrastructure\Database\LanguageRepository;
use App\Education\Language\Root\Repository\Support\GetLanguageOrFail;

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
