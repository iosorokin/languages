<?php

namespace Domain\Root\Core\Language\Repository;

use Domain\Root\Core\Language\Control\Queries\RootFindLanguage;
use Domain\Root\Core\Language\Control\Queries\RootGetLanguages;
use Domain\Root\Core\Language\Model\Aggregates\RootLanguage;
use Domain\Root\Core\Language\Model\Collections\RootLanguages;

interface RootLanguageRepository
{
    public function add(RootLanguage $language): int;

    public function update(RootLanguage $language): void;

    public function find(RootFindLanguage $query): ?RootLanguage;

    public function get(RootGetLanguages $query): RootLanguages;

    public function delete(int $id): void;
}
