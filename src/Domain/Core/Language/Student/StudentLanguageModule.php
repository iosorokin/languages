<?php

namespace Domain\Core\Language\Student;

use App\Model\Roles\Student;
use Domain\Core\Language\Student\Control\Queries\StudentFindLanguage;
use Domain\Core\Language\Student\Control\Queries\StudentGetStudentLanguages;
use Domain\Core\Language\Student\Model\Aggregates\StudentLanguageImp;
use Domain\Core\Language\Student\Model\Collection\StudentLanguages;

interface StudentLanguageModule
{
    public function find(Student $root, StudentFindLanguage $query): StudentLanguageImp;

    public function get(Student $root, StudentGetStudentLanguages $query): StudentLanguages;
}
