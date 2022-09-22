<?php

namespace Modules\Personal\Auth\Repositories;

use App\Extensions\Assert;
use Modules\Personal\Auth\Contexts\Fillers\BaseAuthFiller;
use Modules\Personal\Auth\Structures\BaseAuthModel;
use Modules\Personal\Auth\Structures\BaseAuthStructure;

class EloquentBaseAuthRepository implements BaseAuthRepository
{
    private const TABLE = 'base_auths';

    public function add(BaseAuthStructure $structure): void
    {
        $this->assertIsBaseAuthModel($structure);
        /** @var BaseAuthModel $structure */
        $structure->save();
    }

    public function getByEmail(string $email): ?BaseAuthFiller
    {
        /** @var BaseAuthModel $structure */
        $structure = BaseAuthModel::query()
            ->where('email', $email)
            ->first();

        return $structure ? new BaseAuthFiller($structure) : null;
    }

    private function assertIsBaseAuthModel(BaseAuthStructure $structure): void
    {
        Assert::isInstanceOf($structure, BaseAuthModel::class);
    }
}
