<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Domain\Policies;

use Illuminate\Validation\ValidationException;
use Modules\Core\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;

final class LanguagePolicy
{
    public function canTakeToLearn(LanguageModel $language): void
    {
        if (! $language->isActive()) {
            throw ValidationException::withMessages([
                'language_id' => sprintf('Language %s not active', $language->name)
            ]);
        }
    }
}
