<?php

namespace Domain\Core\Language\Student\Control\Queries;


use App\Model\Roles\Student;
use Domain\Core\Language\Student\Model\Collection\StudentLanguages;
use Domain\Core\Language\Student\Repositories\StudentLanguageRepository;

class StudentGetLanguagesHandler
{
    public function __construct(
        private StudentLanguageRepository $repository,
    ) {}

    public function __invoke(Student $student, StudentGetStudentLanguages $query): StudentLanguages
    {
        $languages = $this->repository->get($student, $query);

        return $languages;
    }
}
