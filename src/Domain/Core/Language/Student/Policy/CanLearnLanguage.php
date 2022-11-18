<?php

declare(strict_types=1);

namespace Domain\Core\Language\Student\Policy;

use App\Exceptions\DomainException;
use Domain\Base\Core\Language\Model\Entity\Language;
use Domain\Core\Language\Student\Repositories\StudentLanguageRepository;

final class CanLearnLanguage
{
    public function __construct(
        private StudentLanguageRepository $repository,
    ) {}

    public function __invoke(Language $language): void
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
