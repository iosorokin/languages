<?php

namespace Domain\Core\Language\Root;

use App\Model\Roles\Root;
use Domain\Core\Language\Base\Model\Aggregate\ReadonlyLanguage;
use Domain\Core\Language\Base\Model\Collection\ReadonlyLanguageCollection;
use Domain\Core\Language\Root\Control\Commands\CreateLanguage;
use Domain\Core\Language\Root\Control\Commands\DeleteLanguage;
use Domain\Core\Language\Root\Control\Commands\UpdateLanguage;
use Domain\Core\Language\Root\Control\Queries\RootFindLanguageImp;
use Domain\Core\Language\Root\Control\Queries\RootGetLanguagesImp;

interface RootLanguageModule
{
    public function create(Root $root, CreateLanguage $command): int;

    public function update(Root $root, UpdateLanguage $command): void;

    public function delete(Root $root, DeleteLanguage $command): void;

    public function find(Root $root, RootFindLanguageImp $query): ?ReadonlyLanguage;

    public function findOrFail(Root $root, RootFindLanguageImp $query): ReadonlyLanguage;

    public function get(Root $root, RootGetLanguagesImp $query): ReadonlyLanguageCollection;
}
