<?php

namespace Domain\Manager\Languages;

use App\Roles\ContentManager;
use Domain\Core\Languages\Model\Manager\Commands\Manager\CreateLanguage;
use Domain\Core\Languages\Model\Manager\Commands\Manager\DeleteLanguage;
use Domain\Core\Languages\Model\Manager\Commands\Manager\UpdateLanguage;
use Domain\Core\Languages\Model\Manager\Queries\FindLanguage;
use Domain\Core\Languages\Model\Manager\Queries\GetLanguages;
use Domain\Core\Languages\Model\Manager\Responses\LanguageResponse;
use Domain\Core\Languages\Model\Manager\Responses\LanguagesResponse;

interface LanguageManagerModule
{
    public function create(ContentManager $manager, CreateLanguage $command): int;

    public function update(ContentManager $manager, UpdateLanguage $command): void;

    public function delete(ContentManager $manager, DeleteLanguage $command): void;

    public function find(ContentManager $manager, FindLanguage $query): LanguageResponse;

    public function get(ContentManager $manager, GetLanguages $query): LanguagesResponse;
}
