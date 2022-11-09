<?php

declare(strict_types=1);

namespace App\Transformers;

use App\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;

final class UserLanguageTransformer extends LanguageTransformer
{
    public function transform(LanguageModel $language): array
    {
        $data = [
            'is_favorite' => $language->is_favorite,
        ];

        return $data + parent::transform($language);
    }
}
