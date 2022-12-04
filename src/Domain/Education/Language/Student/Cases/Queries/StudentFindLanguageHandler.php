<?php

declare(strict_types=1);

namespace Domain\Education\Language\Student\Control\Queries;

use Core\Base\Model\Roles\Student;
use Domain\Education\Language\Student\Model\Aggregates\StudentLanguageImp;
use Domain\Education\Language\Student\Support\StudentGetLanguageOrFail;

class StudentFindLanguageHandler
{
    public function __construct(
        private StudentGetLanguageOrFail $getLanguageOrFail,
    ) {}

    public function __invoke(Student $student, StudentFindLanguage $query): StudentLanguageImp
    {
        $language = ($this->getLanguageOrFail)($student, $query);

        return $language;
    }
}
