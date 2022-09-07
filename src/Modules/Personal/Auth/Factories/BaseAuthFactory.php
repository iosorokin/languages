<?php

namespace Modules\Personal\Auth\Factories;

use App\Structures\Personal\BaseAuthStructure;
use Modules\Personal\Auth\Contexts\BaseAuthContext;
use Modules\Personal\Auth\Dto\CreateBaseAuthDto;

class BaseAuthFactory
{
    public function new(CreateBaseAuthDto $dto): BaseAuthContext
    {
        $baseAuth = new BaseAuthContext($this->createStructure());
        $baseAuth->setAuthable($dto->authable);
        $baseAuth->setEmail($dto->email);
        $baseAuth->setPassword($dto->password);

        return $baseAuth;
    }

    private function createStructure(): BaseAuthStructure
    {
        return app()->make(BaseAuthStructure::class);
    }
}
