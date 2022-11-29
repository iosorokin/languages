<?php

namespace App\Education\Language\Root\Control\Cases;

use App\Education\Language\Base\Repository\Query\Find\FindByCode;
use App\Education\Language\Root\Control\Cases\Dto\DeleteLanguageDto;
use App\Education\Language\Root\Control\Cases\Dto\GetLanguageDto;
use App\Education\Language\Root\Infrastructure\Database\LanguageRepository;
use App\Education\Language\Root\Repository\Support\GetLanguageOrFail;

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
