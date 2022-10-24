<?php

namespace Modules\Personal\Auth\Factories;

use Illuminate\Support\Facades\Hash;
use Modules\Personal\Auth\Model\BaseAuth;

class BaseAuthFactory
{
    public function create(array $attributes): BaseAuth
    {
        $baseAuth = new BaseAuth();
        $baseAuth->email = $attributes['email'];
        $baseAuth->password = Hash::make($attributes['password']);

        return $baseAuth;
    }
}
