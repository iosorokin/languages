<?php

declare(strict_types=1);

namespace Domain\Education\Language\Student\Policy;

use Domain\Exceptions\DomainException;
use Domain\Education\Language\Student\Repositories\StudentLanguageRepository;

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
