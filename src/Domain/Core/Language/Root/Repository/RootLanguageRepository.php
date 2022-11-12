<?php

namespace Domain\Core\Language\Root\Repository;

use Domain\Core\Language\Root\Control\Queries\RootFindLanguage;
use Domain\Core\Language\Root\Control\Queries\RootGetLanguages;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguage;
use Domain\Core\Language\Root\Model\Collections\Languages;

interface RootLanguageRepository
{
    public function add(RootLanguage $language): int;

    public function update(RootLanguage $language): void;

    public function find(RootFindLanguage $query): ?RootLanguage;

    public function get(RootGetLanguages $query): Languages;

    public function delete(int $id): void;
}
