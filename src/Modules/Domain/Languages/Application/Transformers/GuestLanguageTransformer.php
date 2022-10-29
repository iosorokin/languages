<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Application\Transformers;

use Modules\Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;

final class GuestLanguageTransformer extends LanguageTransformer
{
    public function transform(LanguageModel $language): array
    {
        return parent::transform($language);
    }
}
