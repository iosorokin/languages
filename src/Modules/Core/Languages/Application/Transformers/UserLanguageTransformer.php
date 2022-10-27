<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Application\Transformers;

use Modules\Core\Languages\Infrastructure\Model\Language;

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
