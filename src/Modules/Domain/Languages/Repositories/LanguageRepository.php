<?php

namespace Modules\Domain\Languages\Repositories;

use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Languages\Filters\LanguageFilter;

interface LanguageRepository
{
    public function save(Language $language): void;

    public function all(LanguageFilter $filter): Languages;

    public function get(int $id): ?Language;

    public function delete(Language $language): void;
}
