<?php

namespace Domain\Core\Language\Root;

use App\Model\Roles\Root;
use Domain\Core\Language\Root\Control\Commands\RootCreateLanguage;
use Domain\Core\Language\Root\Control\Commands\RootDeleteLanguage;
use Domain\Core\Language\Root\Control\Commands\RootUpdateLanguage;
use Domain\Core\Language\Root\Control\Queries\RootFindLanguage;
use Domain\Core\Language\Root\Control\Queries\RootGetLanguages;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguage;
use Domain\Core\Language\Root\Model\Collections\RootLanguages;

interface RootLanguageModule
{
    public function create(Root $root, RootCreateLanguage $command): int;

    public function update(Root $root, RootUpdateLanguage $command): void;

    public function delete(Root $root, RootDeleteLanguage $command): void;

    public function find(Root $root, RootFindLanguage $query): RootLanguage;

    public function get(Root $root, RootGetLanguages $query): RootLanguages;
}
