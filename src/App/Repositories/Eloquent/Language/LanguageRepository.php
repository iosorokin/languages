<?php

namespace App\Repositories\Eloquent\Language;

use Domain\Core\Languages\Model\Agregates\Language\Language;

interface LanguageRepository
{
    public function add(Language $language): int;

    public function find(int $id): ?Language;
}
