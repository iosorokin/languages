<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Support;

use Domain\Core\Languages\Actions\Manager\Dto\UpdateLanguageDto;
use Domain\Core\Languages\Model\Agregates\Language\Language;
use Domain\Core\Languages\Model\Values\Name\CodeImp;
use Domain\Core\Languages\Model\Values\Name\NameImp;
use Domain\Core\Languages\Model\Values\Name\NativeNameImp;

final class UpdateLanguage
{
    public function __invoke(Language $language, UpdateLanguageDto $dto): void
    {
        $language->changeName(NameImp::new($dto->name()));
        $language->changeNativeName(NativeNameImp::new($dto->nativeName()));
        $language->changeCode(CodeImp::new($dto->code()));
    }
}
