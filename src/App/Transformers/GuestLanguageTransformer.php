<?php

declare(strict_types=1);

namespace App\Transformers;

use App\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;

final class GuestLanguageTransformer extends LanguageTransformer
{
    public function transform(LanguageModel $language): array
    {
        return parent::transform($language);
    }
}
