<?php

declare(strict_types=1);

namespace Core\Infrastructure\Support\Transformers;

use Core\Infrastructure\Database\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;

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
