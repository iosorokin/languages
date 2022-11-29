<?php

namespace App\Education\Language\Root\Control\Cases;

use App\Education\Language\Root\Control\Cases\Dto\GetLanguagesDto;
use App\Education\Language\Root\Domain\Model\LanguageCollection;
use App\Education\Language\Root\Infrastructure\Database\LanguageRepository;

class GetLanguagesHandler
{
    public function __construct(
        private LanguageRepository $repository,
    ) {}

    public function __invoke(GetLanguagesDto $dto): LanguageCollection
    {
        return $this->repository->get($dto);
    }
}
