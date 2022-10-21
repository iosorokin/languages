<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Transformers;

use Modules\Domain\Languages\Structures\Language;

abstract class LanguageTransformer
{
    public function transform(Language $language): array
    {
        return [
            'id' => $language->getId(),
            'code' => $language->getCode(),
            'name' => $language->getName(),
            'nativeName' => $language->getNativeName(),
        ];
    }
}
