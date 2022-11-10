<?php

declare(strict_types=1);

namespace Infrastructure\Support\Transformers;

use Infrastructure\Database\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;

final class GuestLanguageTransformer extends LanguageTransformer
{
    public function transform(LanguageModel $language): array
    {
        return parent::transform($language);
    }
}
