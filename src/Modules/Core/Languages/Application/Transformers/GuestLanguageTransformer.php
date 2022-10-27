<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Application\Transformers;

use Modules\Core\Languages\Infrastructure\Model\Language;

final class GuestLanguageTransformer extends LanguageTransformer
{
    public function transform(Language $language): array
    {
        return parent::transform($language);
    }
}
