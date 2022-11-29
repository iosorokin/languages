<?php

namespace App\Education\Language\Student\Repositories;

use Core\Base\Model\Roles\Student;
use App\Education\Language\Student\Control\Queries\StudentFindLanguage;
use App\Education\Language\Student\Control\Queries\StudentGetStudentLanguages;
use App\Education\Language\Student\Model\Aggregates\StudentLanguageImp;
use App\Education\Language\Student\Model\Collection\StudentLanguages;

interface StudentLanguageRepository
{
    public function find(Student $student, StudentFindLanguage $query): ?StudentLanguageImp;

    public function get(Student $student, StudentGetStudentLanguages $query): StudentLanguages;
}
