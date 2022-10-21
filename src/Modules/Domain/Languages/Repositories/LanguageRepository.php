<?php

namespace Modules\Domain\Languages\Repositories;

use App\Base\Repository\SqlRepository;
use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as NativeBuilder;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Repositories\Filters\UserLanguageFilter;
use Modules\Domain\Languages\Structures\Language;

interface LanguageRepository extends SqlRepository
{
    public function save(Language $language): void;

    public function get(int $id): ?Language;

    public function delete(Language $language): void;
}
