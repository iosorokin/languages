<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Policies;

use Illuminate\Validation\ValidationException;
use Modules\Domain\Languages\Structures\Language;
use Modules\Personal\User\Structures\User;

final class LanguagePolicyImpl implements LanguagePolicy
{
    public function canTakeToLearn(Language $language): void
    {
        if (! $language->isActive()) {
            throw ValidationException::withMessages([
                'language_id' => sprintf('Language %s not active', $language->getName())
            ]);
        }
    }
}
