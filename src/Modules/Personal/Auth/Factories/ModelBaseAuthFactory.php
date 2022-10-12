<?php

namespace Modules\Personal\Auth\Factories;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Modules\Personal\Auth\Structures\BaseAuth;
use Modules\Personal\Auth\Structures\BaseAuthModel;

class ModelBaseAuthFactory implements BaseAuthFactory
{
    public function create(array $attributes): BaseAuth
    {
        $baseAuth = new BaseAuthModel();
        $baseAuth->setEmail(Arr::get($attributes, 'email'));
        $baseAuth->setPassword(Hash::make(Arr::get($attributes, 'password')));

        return $baseAuth;
    }
}
