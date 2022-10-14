<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Transformers;

use Modules\Domain\Languages\Structures\Language;

final class UserLanguageTransformer extends LanguageTransformer
{
    public function transform(Language $language): array
    {
        return parent::transform($language);
    }
}
