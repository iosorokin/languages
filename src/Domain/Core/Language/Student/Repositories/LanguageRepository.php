<?php

namespace Domain\Core\Language\Student\Repositories;

use App\Model\Roles\Student;
use Domain\Core\Language\Student\Model\Aggregates\Language;
use Domain\Core\Language\Student\Model\Collection\Languages;

interface LanguageRepository
{
    public function find(Student $student, int $id): ?Language;

    public function get(Student $student): Languages;

    public function addToFavorite(Language $language): void;

    public function removeFromFavorite(Language $language): void;
}
