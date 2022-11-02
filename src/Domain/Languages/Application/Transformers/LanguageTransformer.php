<?php

declare(strict_types=1);

namespace Domain\Languages\Application\Transformers;

use Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;

abstract class LanguageTransformer
{
    public function transform(LanguageModel $language): array
    {
        return [
            'id' => $language->id,
            'code' => $language->code,
            'name' => $language->name,
            'nativeName' => $language->native_name,
        ];
    }
}
