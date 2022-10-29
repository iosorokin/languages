<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Application\Transformers;

use Modules\Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;

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
