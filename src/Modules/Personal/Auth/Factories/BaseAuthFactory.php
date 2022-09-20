<?php

namespace Modules\Personal\Auth\Factories;

use App\Contracts\Structures\AuthableStructure;
use Illuminate\Support\Arr;
use Modules\Personal\Auth\Contexts\Fillers\BaseAuthFiller;
use Modules\Personal\Auth\Structures\BaseAuthModel;

class BaseAuthFactory
{
    public function new(AuthableStructure $authable, array $attributes): BaseAuthModel
    {
        $baseAuth = new BaseAuthFiller(new BaseAuthModel());
        $baseAuth->setAuthable($authable);
        $baseAuth->setEmail(Arr::get($attributes, 'email'));
        $baseAuth->setPassword(Arr::get($attributes, 'password'));

        return $baseAuth->structure;
    }
}
