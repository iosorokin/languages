<?php

namespace Modules\Education\Source\Repositories;

use App\Extensions\Assert;
use Modules\Education\Source\Entities\SourceModel;
use Modules\Education\Source\Entities\Source;

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
