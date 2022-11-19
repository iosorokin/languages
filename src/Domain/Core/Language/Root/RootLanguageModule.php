<?php

namespace Domain\Core\Language\Root;

use App\Controll\Language\Root\CreateLanguageImp;
use App\Controll\Language\Root\DeleteLanguageImp;
use App\Controll\Language\Root\UpdateLanguageCommand;
use Domain\Core\Language\Base\Model\Aggregate\ReadonlyLanguage;
use Domain\Core\Language\Base\Model\Collection\ReadonlyLanguageCollection;
use Domain\Core\Language\Root\Control\Queries\RootFindLanguage;
use Domain\Core\Language\Root\Control\Queries\RootGetLanguages;

interface RootLanguageModule
{
    public function create(CreateLanguageImp $command): ReadonlyLanguage;

    public function update(UpdateLanguageCommand $command): ReadonlyLanguage;

    public function delete(DeleteLanguageImp $command): void;

    public function find(RootFindLanguage $query): ?ReadonlyLanguage;

    public function findOrFail(RootFindLanguage $query): ReadonlyLanguage;

    public function get(RootGetLanguages $query): ReadonlyLanguageCollection;
}
