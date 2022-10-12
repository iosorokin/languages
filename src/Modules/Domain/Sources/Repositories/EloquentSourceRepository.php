<?php

namespace Modules\Domain\Sources\Repositories;

use Modules\Domain\Sources\Structures\Source;
use Modules\Domain\Sources\Structures\SourceModel;

class EloquentSourceRepository implements SourceRepository
{
    public function save(Source $source): void
    {
        $source->save();
    }

    public function get(int $id): ?Source
    {
        return SourceModel::find($id);
    }
}
