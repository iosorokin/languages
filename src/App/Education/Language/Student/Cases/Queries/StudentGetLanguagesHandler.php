<?php

namespace App\Education\Language\Student\Control\Queries;


use Core\Base\Model\Roles\Student;
use App\Education\Language\Student\Model\Collection\StudentLanguages;
use App\Education\Language\Student\Repositories\StudentLanguageRepository;

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
