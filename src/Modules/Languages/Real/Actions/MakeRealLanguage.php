<?php

namespace Modules\Languages\Real\Actions;

use App\Structures\Languages\RealLanguageStructure;
use Modules\Languages\Real\Contexts\RealLanguageContext;
use Modules\Languages\Real\Dto\CreateRealLanguageDto;

class MakeRealLanguage
{
    public function __invoke(CreateRealLanguageDto $dto): RealLanguageStructure
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
