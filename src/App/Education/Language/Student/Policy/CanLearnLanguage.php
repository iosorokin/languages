<?php

declare(strict_types=1);

namespace App\Education\Language\Student\Policy;

use App\Exceptions\DomainException;
use App\Education\Language\Student\Repositories\StudentLanguageRepository;

final class CanLearnLanguage
{
    public function __construct(
        private StudentLanguageRepository $repository,
    ) {}

    public function __invoke(int $id): void
    {
        $canTakeToLearn = $this->repository->canTakeToLearn($language->id());
        if (! $canTakeToLearn) {
            throw new DomainException(sprintf(
                'Language %d can not take to learn',
                $language->id()->toInt(),
            ));
        }
    }
}
