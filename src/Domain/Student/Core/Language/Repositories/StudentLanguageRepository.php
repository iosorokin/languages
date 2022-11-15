<?php

namespace Domain\Student\Core\Language\Repositories;

use App\Model\Roles\Student;
use App\Model\Values\Identificatiors\Id\IntId;
use Domain\Student\Core\Language\Control\Queries\StudentFindLanguage;
use Domain\Student\Core\Language\Control\Queries\StudentGetStudentLanguages;
use Domain\Student\Core\Language\Model\Aggregates\StudentLanguage;
use Domain\Student\Core\Language\Model\Collection\StudentLanguages;

interface StudentLanguageRepository
{
    public function find(Student $student, StudentFindLanguage $query): ?StudentLanguage;

    public function get(Student $student, StudentGetStudentLanguages $query): StudentLanguages;

    public function canTakeToLearn(IntId $id): bool;
}
