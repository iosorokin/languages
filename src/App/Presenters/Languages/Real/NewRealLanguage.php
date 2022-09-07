<?php

namespace App\Presenters\Languages\Real;

use App\Repositories\Lanugages\RealLanguageRepository;
use App\Structures\Languages\RealLanguageStructure;
use Illuminate\Support\Arr;
use Modules\Languages\Real\Actions\MakeRealLanguage;
use Modules\Languages\Real\Dto\CreateRealLanguageDto;

class NewRealLanguage
{
    public function __construct(
        private MakeRealLanguage       $makeLanguage,
        private RealLanguageRepository $repository,
    ) {}

    public function __invoke(array $attributes): RealLanguageStructure
    {
        $dto = $this->createDto($attributes);
        $language = ($this->makeLanguage)($dto);
        $this->repository->add($language);

        return $language;
    }

    private function createDto(array $attributes): CreateRealLanguageDto
    {
        return new CreateRealLanguageDto(
            name: Arr::get($attributes, 'name'),
            nativeName: Arr::get($attributes, 'native_name'),
            code: Arr::get($attributes, 'code'),
        );
    }
}
