<?php

namespace Modules\Languages\Real\Factories;

use Modules\Languages\Real\Contexts\RealLanguageContext;
use Modules\Languages\Real\Dto\CreateRealLanguageDto;
use Modules\Languages\Real\Structures\RealLanguageStructure;
use stdClass;

class RealLanguageFactory
{
    public function new(CreateRealLanguageDto $dto): RealLanguageContext
    {
        $language = $this->createLanguageContext();
        $this->fill($language, $dto);

        return $language;
    }

    public function restore(stdClass $item): RealLanguageContext
    {
        $language = $this->createLanguageContext();
        $this->fill($language, $item);
        $language->setId($item->id);

        return $language;
    }

    private function fill(RealLanguageContext $language, CreateRealLanguageDto|stdClass $dto): void
    {
        $language->setName($dto->name);
        $language->setNativeName($dto->native_name);
        $language->setCode($dto->code);
    }

    private function createLanguageContext(): RealLanguageContext
    {
        return new RealLanguageContext(app()->make(RealLanguageStructure::class));
    }
}
