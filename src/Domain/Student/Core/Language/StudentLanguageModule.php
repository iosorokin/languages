<?php

namespace Domain\Student\Core\Language;

use App\Model\Roles\Student;
use Domain\Student\Core\Language\Control\Queries\StudentFindLanguage;
use Domain\Student\Core\Language\Control\Queries\StudentGetStudentLanguages;
use Domain\Student\Core\Language\Model\Aggregates\StudentLanguage;
use Domain\Student\Core\Language\Model\Collection\StudentLanguages;

interface StudentLanguageModule
{
    public function find(Student $root, StudentFindLanguage $query): StudentLanguage;

    public function get(Student $root, StudentGetStudentLanguages $query): StudentLanguages;
}
