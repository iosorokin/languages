<?php

declare(strict_types=1);

namespace Domain\Student\Core\Language;

use App\Model\Roles\Student;
use Domain\Student\Core\Language\Control\Queries\StudentFindLanguage;
use Domain\Student\Core\Language\Control\Queries\StudentFindLanguageHandler;
use Domain\Student\Core\Language\Control\Queries\StudentGetLanguagesHandler;
use Domain\Student\Core\Language\Control\Queries\StudentGetStudentLanguages;
use Domain\Student\Core\Language\Model\Aggregates\StudentLanguage;
use Domain\Student\Core\Language\Model\Collection\StudentLanguages;

final class StudentLanguageModuleProd implements StudentLanguageModule
{
    public function find(Student $student, StudentFindLanguage $query): StudentLanguage
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
