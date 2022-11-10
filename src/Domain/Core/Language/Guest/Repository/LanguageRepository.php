<?php

namespace Domain\Core\Language\Guest\Repository;

use Domain\Core\Language\Guest\Model\Aggregate\Language;
use Domain\Core\Language\Guest\Model\Collection\Languages;

interface LanguageRepository
{
    public function find(int $id): ?Language;

    public function get(): Languages;
}
