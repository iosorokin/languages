<?php

namespace App\Education\Language\Student;

use Core\Base\Model\Roles\Student;
use App\Education\Language\Student\Control\Queries\StudentFindLanguage;
use App\Education\Language\Student\Control\Queries\StudentGetStudentLanguages;
use App\Education\Language\Student\Model\Aggregates\StudentLanguageImp;
use App\Education\Language\Student\Model\Collection\StudentLanguages;

interface StudentLanguageModule
{
    public function find(Student $root, StudentFindLanguage $query): StudentLanguageImp;

    public function get(Student $root, StudentGetStudentLanguages $query): StudentLanguages;
}
