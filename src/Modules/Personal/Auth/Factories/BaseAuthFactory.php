<?php

namespace Modules\Personal\Auth\Factories;

use App\Contracts\Structures\Personal\BaseAuthStructure;
use Modules\Personal\Auth\Contexts\Fillers\BaseAuthFiller;
use Modules\Personal\Auth\Dto\CreateBaseAuthDto;

class BaseAuthFactory
{
    public function new(CreateBaseAuthDto $dto): BaseAuthFiller
    {
        $baseAuth = new BaseAuthFiller($this->createStructure());
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
