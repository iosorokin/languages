<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Agregates\Language\Policies;

use App\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;
use Illuminate\Validation\ValidationException;

final class CanTakeToLearn
{
    public function __invoke(LanguageModel $language): void
    {
        if (! $language->isActive()) {
            throw ValidationException::withMessages([
                'language_id' => sprintf('Language %s not active', $language->name)
            ]);
        }
    }
}
