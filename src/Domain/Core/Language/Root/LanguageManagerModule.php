<?php

namespace Domain\Core\Language\Root;

use App\Roles\ContentManager;
use Domain\Core\Language\Root\Control\Commands\RootCreateLanguage;
use Domain\Core\Language\Root\Control\Commands\RootDeleteLanguage;
use Domain\Core\Language\Root\Control\Commands\RootUpdateLanguage;
use Domain\Core\Language\Root\Control\Queries\RootFindLanguage;
use Domain\Core\Language\Root\Control\Queries\RootGetLanguages;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguage;
use Domain\Core\Language\Root\Model\Collections\RootLanguages;

interface LanguageManagerModule
{
    public function create(ContentManager $manager, RootCreateLanguage $command): int;

    public function update(ContentManager $manager, RootUpdateLanguage $command): void;

    public function delete(ContentManager $manager, RootDeleteLanguage $command): void;

    public function find(ContentManager $manager, RootFindLanguage $query): RootLanguage;

    public function get(ContentManager $manager, RootGetLanguages $query): RootLanguages;
}
