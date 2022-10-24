<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Transformers;

use Modules\Domain\Languages\Model\Language;

final class UserLanguageTransformer extends LanguageTransformer
{
    public function transform(Language $language): array
    {
        $data = [
            'is_favorite' => $language->is_favorite,
        ];

        return $data + parent::transform($language);
    }
}
