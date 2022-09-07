<?php

namespace Modules\Languages\Real\Presenters;

use App\Contracts\Presenters\Languages\Real\CreateRealLanguagePresenter;
use App\Contracts\Structures\Languages\RealLanguageStructure;
use Modules\Languages\Real\Dto\CreateRealLanguageDto;
use Modules\Languages\Real\Factories\RealLanguageFactory;
use Modules\Languages\Real\Repositories\RealLanguageRepository;

class CreateRealLanguage implements CreateRealLanguagePresenter
{
    public function __construct(
        private RealLanguageFactory    $languageFactory,
        private RealLanguageRepository $repository,
    ) {}

    public function __invoke(array $attributes): RealLanguageStructure
    {
        $dto = CreateRealLanguageDto::new($attributes);
        $language = $this->languageFactory->new($dto);
        $this->repository->add($language->structure);

        return $language->structure;
    }
}
