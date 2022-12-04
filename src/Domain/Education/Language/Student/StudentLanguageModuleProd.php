<?php

declare(strict_types=1);

namespace Domain\Education\Language\Student;

use Core\Base\Model\Roles\Student;
use Domain\Education\Language\Student\Control\Queries\StudentFindLanguage;
use Domain\Education\Language\Student\Control\Queries\StudentFindLanguageHandler;
use Domain\Education\Language\Student\Control\Queries\StudentGetLanguagesHandler;
use Domain\Education\Language\Student\Control\Queries\StudentGetStudentLanguages;
use Domain\Education\Language\Student\Model\Aggregates\StudentLanguageImp;
use Domain\Education\Language\Student\Model\Collection\StudentLanguages;

final class StudentLanguageModuleProd implements StudentLanguageModule
{
    public function find(Student $student, StudentFindLanguage $query): StudentLanguageImp
    {
        /** @var StudentFindLanguageHandler $action */
        $action = app()->make(StudentFindLanguageHandler::class);

        return $action($student, $query);
    }

    public function get(Student $student, StudentGetStudentLanguages $query): StudentLanguages
    {
        /** @var StudentGetLanguagesHandler $action */
        $action = app()->make(StudentGetLanguagesHandler::class);

        return $action($student, $query);
    }
}
