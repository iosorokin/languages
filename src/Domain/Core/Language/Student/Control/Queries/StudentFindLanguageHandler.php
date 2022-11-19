<?php

declare(strict_types=1);

namespace Domain\Core\Language\Student\Control\Queries;

use App\Base\Model\Roles\Student;
use Domain\Core\Language\Student\Model\Aggregates\StudentLanguageImp;
use Domain\Core\Language\Student\Support\StudentGetLanguageOrFail;

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
