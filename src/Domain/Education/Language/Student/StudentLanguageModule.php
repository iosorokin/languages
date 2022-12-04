<?php

namespace Domain\Education\Language\Student;

use Core\Base\Model\Roles\Student;
use Domain\Education\Language\Student\Control\Queries\StudentFindLanguage;
use Domain\Education\Language\Student\Control\Queries\StudentGetStudentLanguages;
use Domain\Education\Language\Student\Model\Aggregates\StudentLanguageImp;
use Domain\Education\Language\Student\Model\Collection\StudentLanguages;

interface StudentLanguageModule
{
    public function find(Student $root, StudentFindLanguage $query): StudentLanguageImp;

    public function get(Student $root, StudentGetStudentLanguages $query): StudentLanguages;
}
