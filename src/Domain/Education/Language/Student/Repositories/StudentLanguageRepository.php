<?php

namespace Domain\Education\Language\Student\Repositories;

use Core\Base\Model\Roles\Student;
use Domain\Education\Language\Student\Control\Queries\StudentFindLanguage;
use Domain\Education\Language\Student\Control\Queries\StudentGetStudentLanguages;
use Domain\Education\Language\Student\Model\Aggregates\StudentLanguageImp;
use Domain\Education\Language\Student\Model\Collection\StudentLanguages;

interface StudentLanguageRepository
{
    public function find(Student $student, StudentFindLanguage $query): ?StudentLanguageImp;

    public function get(Student $student, StudentGetStudentLanguages $query): StudentLanguages;
}
