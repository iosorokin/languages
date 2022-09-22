<?php

namespace Modules\Personal\Employers\Repositories;

use App\Contracts\Structures\EmployerStructure;
use App\Extensions\Assert;
use Modules\Personal\Employers\Structures\EmployerModel;

class EloquentEmployerRepository implements EmployerRepository
{
    public function add(EmployerStructure $structure): void
    {
        $this->assertEloquentModel($structure);
        /** @var EmployerModel $structure */
        $structure->save();
    }

    public function getById(int $id): ?EmployerStructure
    {
        return EmployerModel::find($id);
    }

    private function assertEloquentModel(EmployerStructure $structure): void
    {
        Assert::isInstanceOf($structure, EmployerModel::class);
    }
}
