<?php

namespace Modules\Languages\Real\Factories;

use App\Contracts\Structures\Languages\RealLanguageStructure;
use Modules\Languages\Real\Contexts\RealLanguageContext;
use Modules\Languages\Real\Dto\CreateRealLanguageDto;

class RealLanguageFactory
{
    public function new(CreateRealLanguageDto $dto): RealLanguageStructure
    {
        $language = new RealLanguageContext($this->createLanguageStructure());
        $language->setName($dto->name);
        $language->setNativeName($dto->nativeName);
        $language->setCode($dto->code);

        return $language->structure;
    }

    private function createLanguageStructure(): RealLanguageStructure
    {
        return app()->make(RealLanguageStructure::class);
    }
}
