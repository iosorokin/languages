<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Manager\Aggregates\Student\Policies;

use Illuminate\Validation\ValidationException;
use Infrastructure\Database\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;

final class StudentCanTakeToLearn
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
