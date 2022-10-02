<?php

namespace Modules\Personal\Auth\Factories;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Modules\Personal\Auth\Entity\BaseAuth;
use Modules\Personal\Auth\Entity\BaseAuthModel;
use Modules\Personal\Auth\Validators\CreateBaseAuthValidator;

class ModelBaseAuthFactory implements BaseAuthFactory
{
    public function __construct(
        private CreateBaseAuthValidator $validator,
    ) {}

    public function create(array $attributes): BaseAuth
    {
        $attributes = $this->validator->validate($attributes);
        $baseAuth = new BaseAuthModel();
        $baseAuth->setEmail(Arr::get($attributes, 'email'));
        $baseAuth->setPassword(Arr::get($attributes, 'password'));

        return $baseAuth;
    }
}
