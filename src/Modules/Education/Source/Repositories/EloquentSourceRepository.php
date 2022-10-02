<?php

namespace Modules\Education\Source\Repositories;

use App\Extensions\Assert;
use Modules\Education\Source\Entity\SourceModel;
use Modules\Education\Source\Entity\Source;

class EloquentSourceRepository implements SourceRepository
{
    public function save(Source $source): void
    {
        $this->assertEloquentModel($source);
        $source->save();
    }

    private function assertEloquentModel(Source $source): void
    {
        Assert::isInstanceOf($source, SourceModel::class);
    }
}
