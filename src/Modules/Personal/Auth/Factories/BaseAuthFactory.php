<?php

namespace Modules\Personal\Auth\Factories;

use App\Contracts\Structures\AuthableStructure;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Modules\Personal\Auth\Contexts\Fillers\BaseAuthFiller;
use Modules\Personal\Auth\Structures\BaseAuthModel;

class BaseAuthFactory
{
    public function new(array $attributes): BaseAuthModel
    {
        $baseAuth = new BaseAuthModel();
        $baseAuth->email = Arr::get($attributes, 'email');
        $baseAuth->password = Hash::make(Arr::get($attributes, 'password'));

        return $baseAuth;
    }
}
