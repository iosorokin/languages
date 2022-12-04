<?php

namespace Domain\Education\Language\Root;

use Core\Base\Model\Roles\Root;
use Domain\Education\Language\Root\Control\Cases\Dto\CreateLanguageDto;
use Domain\Education\Language\Root\Control\Cases\Dto\DeleteLanguageDto;
use Domain\Education\Language\Root\Control\Cases\Dto\GetLanguageDto;
use Domain\Education\Language\Root\Control\Cases\Dto\GetLanguagesDto;
use Domain\Education\Language\Root\Control\Cases\Dto\UpdateLanguageDto;
use Domain\Education\Language\Root\Domain\Model\LanguageCollection;
use Domain\Education\Language\Root\Domain\Model\Language;

interface RootLanguageModule
{
    public function __construct(Root $root);

    public function create(CreateLanguageDto $dto): Language;

    public function update(UpdateLanguageDto $dto): void;

    public function delete(DeleteLanguageDto $dto): void;

    public function find(GetLanguageDto $dto): ?Language;

    public function findOrFail(GetLanguageDto $dto): Language;

    public function get(GetLanguagesDto $dto): LanguageCollection;
}
