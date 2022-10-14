<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Transformers;

use Modules\Domain\Languages\Structures\Language;

final class AdminLanguageTransformer extends LanguageTransformer
{
    public function transform(Language $language): array
    {
        $data = [
            'id' => $language->getId(),
            'user_id' => $language->getUser()->getName(),
            'is_active' => $language->isActive(),
            'created_at' => $language->getCreatedAt(),
            'updated_at' => $language->getUpdatedAt(),
        ];

        return $data + parent::transform($language);
    }
}
