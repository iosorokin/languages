<?php

namespace Modules\Education\Source\Repositories;

use App\Extensions\Assert;
use Modules\Education\Source\Structures\SourceModel;
use Modules\Education\Source\Structures\SourceStructure;

class EloquentSourceRepository implements SourceRepository
{
    public function add(SourceStructure $source): void
    {
        $this->assertEloquentModel($source);
        $source->save();
    }

    private function assertEloquentModel(SourceStructure $source): void
    {
        Assert::isInstanceOf($source, SourceModel::class);
    }
}
