<?php

namespace Domain\Core\Language\Root\Control;

use Domain\Core\Language\Base\Repository\Query\Find\FindByCode;
use Domain\Core\Language\Root\Control\Dto\DeleteLanguageDto;
use Domain\Core\Language\Root\Control\Dto\FindLanguageDto;
use Domain\Core\Language\Root\Repository\LanguageRepository;
use Domain\Core\Language\Root\Support\GetLanguageOrFail;

class DeleteLanguageHandler
{
    public function __construct(
        private LanguageRepository $repository,
        private GetLanguageOrFail  $getLanguageOrFail,
    ) {}

    public function __invoke(DeleteLanguageDto $dto): void
    {
        $findDto = new FindLanguageDto(new FindByCode($dto->code()));
        $language = ($this->getLanguageOrFail)($findDto);
        $this->repository->delete($language->code());
    }
}
