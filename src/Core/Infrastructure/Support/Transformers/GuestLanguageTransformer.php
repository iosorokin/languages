<?php

declare(strict_types=1);

namespace Core\Infrastructure\Support\Transformers;

use Core\Infrastructure\Database\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;

final class GuestLanguageTransformer extends LanguageTransformer
{
    public function transform(LanguageModel $language): array
    {
        return parent::transform($language);
    }
}
