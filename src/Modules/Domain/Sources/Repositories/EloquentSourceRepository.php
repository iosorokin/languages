<?php

namespace Modules\Domain\Sources\Repositories;

use App\Base\Repository\BaseSqlRepository;
use Modules\Domain\Sources\Structures\Source;
use Modules\Domain\Sources\Structures\SourceModel;

class EloquentSourceRepository extends BaseSqlRepository implements SourceRepository
{
    public function save(Source $source): void
    {
        $source->save();
    }

    public function get(int $id): ?Source
    {
        return SourceModel::find($id);
    }

    public function isUserFirstSourcesByLanguage(int $userId, int $languageId): bool
    {
        $countUserSourcesByLanguage = SourceModel::query()
            ->where('user_id', $userId)
            ->where('language_id', $languageId)
            ->count();

        return $countUserSourcesByLanguage === 1;
    }
}
