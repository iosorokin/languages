<?php

namespace Domain\Education\Language\Root\Control\Cases;

use Domain\Education\Language\Base\Repository\Query\Find\FindByCode;
use Domain\Education\Language\Root\Control\Cases\Dto\DeleteLanguageDto;
use Domain\Education\Language\Root\Control\Cases\Dto\GetLanguageDto;
use Domain\Education\Language\Root\Infrastructure\Database\LanguageRepository;
use Domain\Education\Language\Root\Repository\Support\GetLanguageOrFail;

class DeleteLanguageHandler
{
    public function __construct(
        private LanguageRepository $repository,
        private GetLanguageOrFail  $getLanguageOrFail,
    ) {}

    public function __invoke(DeleteLanguageDto $dto): void
    {
        $findDto = new GetLanguageDto(new FindByCode($dto->code()));
        $language = ($this->getLanguageOrFail)($findDto);
        $this->repository->delete($language->code());
    }
}
