<?php

namespace Domain\Core\Language\Root;

use App\Model\Roles\Root;
use Domain\Core\Language\Root\Control\Commands\CreateLanguage;
use Domain\Core\Language\Root\Control\Commands\DeleteLanguage;
use Domain\Core\Language\Root\Control\Commands\UpdateLanguage;
use Domain\Core\Language\Root\Control\Queries\FindLanguage;
use Domain\Core\Language\Root\Control\Queries\GetLanguages;
use Domain\Core\Language\Root\Model\Aggregates\Language;
use Domain\Core\Language\Root\Model\Collections\Languages;

interface LanguageModule
{
    public function create(Root $root, CreateLanguage $command): int;

    public function update(Root $root, UpdateLanguage $command): void;

    public function delete(Root $root, DeleteLanguage $command): void;

    public function find(Root $root, FindLanguage $query): Language;

    public function get(Root $root, GetLanguages $query): Languages;
}
