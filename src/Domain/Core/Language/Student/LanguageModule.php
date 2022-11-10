<?php

namespace Domain\Core\Language\Student;

use App\Model\Roles\Student;
use Domain\Core\Language\Student\Control\FindLanguage;

interface LanguageModule
{
    public function find(Student $root, FindLanguage $query): Language;

    public function get(Student $root, GetLanguages $query): Languages;
}
