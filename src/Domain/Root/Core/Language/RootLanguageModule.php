<?php

namespace Domain\Root\Core\Language;

use App\Model\Roles\Root;
use Domain\Root\Core\Language\Control\Commands\RootCreateLanguage;
use Domain\Root\Core\Language\Control\Commands\RootDeleteLanguage;
use Domain\Root\Core\Language\Control\Commands\RootUpdateLanguage;
use Domain\Root\Core\Language\Control\Queries\RootFindLanguage;
use Domain\Root\Core\Language\Control\Queries\RootGetLanguages;
use Domain\Root\Core\Language\Model\Aggregates\RootLanguage;
use Domain\Root\Core\Language\Model\Collections\RootLanguages;

interface RootLanguageModule
{
    public function create(Root $root, RootCreateLanguage $command): int;

    public function update(Root $root, RootUpdateLanguage $command): void;

    public function delete(Root $root, RootDeleteLanguage $command): void;

    public function find(Root $root, RootFindLanguage $query): RootLanguage;

    public function get(Root $root, RootGetLanguages $query): RootLanguages;
}
