<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Domain\Policies;

use Domain\Core\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;
use Illuminate\Validation\ValidationException;

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
