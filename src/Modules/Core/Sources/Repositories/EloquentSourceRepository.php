<?php

namespace Modules\Core\Sources\Repositories;

use Modules\Core\Sources\Entities\Source;
use Modules\Core\Sources\Entities\SourceModel;

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
