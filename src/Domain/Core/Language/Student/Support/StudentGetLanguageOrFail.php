<?php

declare(strict_types=1);

namespace Domain\Core\Language\Student\Support;

use App\Exceptions\EntityNotFound;
use App\Model\Roles\Student;
use Domain\Core\Language\Student\Control\Queries\StudentFindLanguage;
use Domain\Core\Language\Student\Model\Aggregates\StudentLanguageImp;
use Domain\Core\Language\Student\Policy\CanShowToPublic;
use Domain\Core\Language\Student\Repositories\StudentLanguageRepository;

final class StudentGetLanguageOrFail
{
    public function __construct(
        private StudentLanguageRepository $repository,
        private CanShowToPublic           $canShowToStudent,
    ){}

    public function __invoke(Student $student, StudentFindLanguage $query): StudentLanguageImp
    {
        $language = $this->repository->find($student, $query);
        if (! $language) {
            throw new EntityNotFound('language_id', $query->id());
        }

        ($this->canShowToStudent)($language);

        return $language;
    }
}
