<?php

namespace App\Education\Language\Root;

use Core\Base\Model\Roles\Root;
use App\Education\Language\Root\Control\Cases\Dto\CreateLanguageDto;
use App\Education\Language\Root\Control\Cases\Dto\DeleteLanguageDto;
use App\Education\Language\Root\Control\Cases\Dto\GetLanguageDto;
use App\Education\Language\Root\Control\Cases\Dto\GetLanguagesDto;
use App\Education\Language\Root\Control\Cases\Dto\UpdateLanguageDto;
use App\Education\Language\Root\Domain\Model\LanguageCollection;
use App\Education\Language\Root\Domain\Model\Language;

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
