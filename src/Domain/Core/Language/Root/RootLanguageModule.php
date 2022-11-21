<?php

namespace Domain\Core\Language\Root;

use App\Base\Model\Roles\Root;
use Domain\Core\Language\Root\Control\Dto\CreateLanguageDto;
use Domain\Core\Language\Root\Control\Dto\DeleteLanguageDto;
use Domain\Core\Language\Root\Control\Dto\FindLanguageDto;
use Domain\Core\Language\Root\Control\Dto\GetLanguagesDto;
use Domain\Core\Language\Root\Control\Dto\UpdateLanguageDto;
use Domain\Core\Language\Root\Model\Language;
use Domain\Core\Language\Root\Model\LanguageCollection;

interface RootLanguageModule
{
    public function __construct(Root $root);

    public function create(CreateLanguageDto $dto): Language;

    public function update(UpdateLanguageDto $dto): void;

    public function delete(DeleteLanguageDto $dto): void;

    public function find(FindLanguageDto $dto): ?Language;

    public function findOrFail(FindLanguageDto $dto): Language;

    public function get(GetLanguagesDto $dto): LanguageCollection;
}
