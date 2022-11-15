<?php

namespace Domain\Student\Core\Language\Control\Queries;


use App\Model\Roles\Student;
use Domain\Student\Core\Language\Model\Collection\StudentLanguages;
use Domain\Student\Core\Language\Repositories\StudentLanguageRepository;

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
