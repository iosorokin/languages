<?php

namespace Modules\Domain\Languages\Repositories\Eloquent;

use App\Base\Repository\BaseSqlRepository;
use App\Extensions\Assert;
use Core\Services\Pagination\CursorPaginator;
use Illuminate\Contracts\Pagination\CursorPaginator as EloquentCursorPaginator;
use Illuminate\Database\Query\Builder;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Repositories\Filters\UserLanguageFilter;
use Modules\Domain\Languages\Repositories\LanguageRepository;
use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Languages\Structures\LanguageModel;

final class EloquentLanguageRepository extends BaseSqlRepository implements LanguageRepository
{
    public function save(Language $language): void
    {
        Assert::isInstanceOf($language, LanguageModel::class);
        /** @var LanguageModel $language */
        $language->save();
    }

    public function get(int $id): ?Language
    {
        return LanguageModel::find($id);
    }

    public function delete(Language $language): void
    {
        $language->delete();
    }
}
