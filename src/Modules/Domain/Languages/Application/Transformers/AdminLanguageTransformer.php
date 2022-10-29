<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Application\Transformers;

use Modules\Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;

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
