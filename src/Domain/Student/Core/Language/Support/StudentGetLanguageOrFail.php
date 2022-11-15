<?php

declare(strict_types=1);

namespace Domain\Student\Core\Language\Support;

use App\Exceptions\EntityNotFound;
use App\Model\Roles\Student;
use Domain\Base\Core\Language\Policy\CanShowToPublic;
use Domain\Student\Core\Language\Control\Queries\StudentFindLanguage;
use Domain\Student\Core\Language\Model\Aggregates\StudentLanguage;
use Domain\Student\Core\Language\Repositories\StudentLanguageRepository;

final class StudentGetLanguageOrFail
{
    public function __construct(
        private StudentLanguageRepository $repository,
        private CanShowToPublic           $canShowToStudent,
    ){}

    public function __invoke(Student $student, StudentFindLanguage $query): StudentLanguage
    {
        $language = $this->repository->find($student, $query);
        if (! $language) {
            throw new EntityNotFound('language_id', $query->id());
        }

        ($this->canShowToStudent)($language);

        return $language;
    }
}
