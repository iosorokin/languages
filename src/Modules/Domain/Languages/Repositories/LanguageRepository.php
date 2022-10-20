<?php

namespace Modules\Domain\Languages\Repositories;

use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as NativeBuilder;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Queries\Filters\LanguageFilter;
use Modules\Domain\Languages\Structures\Language;

interface LanguageRepository
{
    public function builder(): EloquentBuilder|NativeBuilder;

    public function save(Language $language): void;

    public function all(LanguageFilter $filter): Languages;

    public function get(int $id): ?Language;

    public function delete(Language $language): void;


}
