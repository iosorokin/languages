<?php

namespace Domain\Core\Language\Student\Repositories;

use App\Model\Roles\Student;
use Domain\Core\Language\Student\Control\Queries\StudentFindLanguage;
use Domain\Core\Language\Student\Control\Queries\StudentGetStudentLanguages;
use Domain\Core\Language\Student\Model\Aggregates\StudentLanguage;
use Domain\Core\Language\Student\Model\Collection\StudentLanguages;

interface StudentLanguageRepository
{
    public function find(Student $student, StudentFindLanguage $query): ?StudentLanguage;

    public function get(Student $student, StudentGetStudentLanguages $query): StudentLanguages;

    public function addToFavorite(StudentLanguage $language): void;

    public function removeFromFavorite(StudentLanguage $language): void;
}
