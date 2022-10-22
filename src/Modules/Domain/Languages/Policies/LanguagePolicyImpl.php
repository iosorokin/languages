<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Policies;

use Illuminate\Validation\ValidationException;
use Modules\Domain\Languages\Structures\Language;
use Modules\Personal\Auth\Contexts\Client;

final class LanguagePolicyImpl implements LanguagePolicy
{
    public function canTakeToLearn(Client $client, Language $language): void
    {
        if (! $language->isActive()) {
            throw ValidationException::withMessages([
                'language_id' => sprintf('Language %s not active', $language->getName())
            ]);
        }
    }
}
