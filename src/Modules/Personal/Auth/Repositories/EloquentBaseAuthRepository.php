<?php

namespace Modules\Personal\Auth\Repositories;

use App\Contracts\Structures\Personal\BaseAuthStructure;
use App\Extensions\Assert;
use Modules\Personal\Auth\Contexts\BaseAuthContext;
use Modules\Personal\Auth\Structures\BaseAuthModel;

class EloquentBaseAuthRepository implements BaseAuthRepository
{
    private const TABLE = 'base_auths';

    public function add(BaseAuthStructure $structure): void
    {
        $this->assertIsBaseAuthModel($structure);
        /** @var BaseAuthModel $structure */
        $structure->save();
    }

    public function getByEmail(string $email): ?BaseAuthContext
    {
        /** @var BaseAuthModel $structure */
        $structure = BaseAuthModel::query()
            ->where('email', $email)
            ->first();

        return $structure ? new BaseAuthContext($structure) : null;
    }

    private function assertIsBaseAuthModel(BaseAuthStructure $structure): void
    {
        Assert::isInstanceOf($structure, BaseAuthModel::class);
    }
}
