<?php

declare(strict_types=1);

namespace Domain\Base\Core\Language\Policy;

use App\Exceptions\DomainException;
use App\Model\Values\Identificatiors\Id\IntId;
use Domain\Student\Core\Language\Repositories\StudentLanguageRepository;

final class CanLearnLanguage
{
    public function __construct(
        private StudentLanguageRepository $repository,
    ) {}

    public function __invoke(IntId $id): void
    {
        $canTakeToLearn = $this->repository->canTakeToLearn($id);
        if (! $canTakeToLearn) {
            throw new DomainException(sprintf(
                'Language %d can not take to learn',
                $id->toInt(),
            ));
        }
    }
}
