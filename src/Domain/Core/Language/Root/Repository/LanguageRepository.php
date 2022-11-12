<?php

namespace Domain\Core\Language\Root\Repository;

use Domain\Core\Language\Root\Control\Queries\FindLanguage;
use Domain\Core\Language\Root\Control\Queries\GetLanguages;
use Domain\Core\Language\Root\Model\Aggregates\Language;
use Domain\Core\Language\Root\Model\Collections\Languages;

interface LanguageRepository
{
    public function add(Language $language): int;

    public function update(Language $language): void;

    public function find(FindLanguage $query): ?Language;

    public function get(GetLanguages $query): Languages;

    public function delete(int $id): void;
}
