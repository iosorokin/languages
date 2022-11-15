<?php

declare(strict_types=1);

namespace Domain\Student\Core\Language\Control\Queries;

use App\Model\Roles\Student;
use Domain\Student\Core\Language\Model\Aggregates\StudentLanguage;
use Domain\Student\Core\Language\Support\StudentGetLanguageOrFail;

class StudentFindLanguageHandler
{
    public function __construct(
        private StudentGetLanguageOrFail $getLanguageOrFail,
    ) {}

    public function __invoke(Student $student, StudentFindLanguage $query): StudentLanguage
    {
        $language = ($this->getLanguageOrFail)($student, $query);

        return $language;
    }
}
