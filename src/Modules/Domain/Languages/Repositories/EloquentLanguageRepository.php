<?php

namespace Modules\Domain\Languages\Repositories;

use App\Base\Repository\BaseSqlRepository;
use App\Extensions\Assert;
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
