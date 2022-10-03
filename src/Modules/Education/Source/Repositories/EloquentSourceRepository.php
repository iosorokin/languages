<?php

namespace Modules\Education\Source\Repositories;

use App\Extensions\Assert;
use Modules\Education\Source\Entity\SourceModel;
use Modules\Education\Source\Entity\Source;

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
