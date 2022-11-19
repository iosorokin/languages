<?php

namespace Domain\Core\Language\Student\Repositories;

use App\Base\Model\Roles\Student;
use Domain\Core\Language\Student\Control\Queries\StudentFindLanguage;
use Domain\Core\Language\Student\Control\Queries\StudentGetStudentLanguages;
use Domain\Core\Language\Student\Model\Aggregates\StudentLanguageImp;
use Domain\Core\Language\Student\Model\Collection\StudentLanguages;

interface StudentLanguageRepository
{
    public function find(Student $student, StudentFindLanguage $query): ?StudentLanguageImp;

    public function get(Student $student, StudentGetStudentLanguages $query): StudentLanguages;
}
