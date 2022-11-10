<?php

declare(strict_types=1);

namespace App\Transformers;

use App\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;

final class AdminLanguageTransformer extends LanguageTransformer
{
    public function transform(LanguageModel $language): array
    {
        $data = [
            'user_id' => $language->user->name,
            'is_active' => $language->is_active,
            'created_at' => $language->created_at,
            'updated_at' => $language->updated_at,
        ];

        return $data + parent::transform($language);
    }
}