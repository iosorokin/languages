<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Application\Transformers;

use Modules\Core\Languages\Infrastructure\Model\Language;

abstract class LanguageTransformer
{
    public function transform(Language $language): array
    {
        return [
            'id' => $language->id,
            'code' => $language->code,
            'name' => $language->name,
            'nativeName' => $language->native_name,
        ];
    }
}
