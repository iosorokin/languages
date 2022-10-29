<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Domain\Policies;

use Illuminate\Validation\ValidationException;
use Modules\Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;

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
