<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Presenters\Internal;

use Exception;
use Illuminate\Support\Facades\Hash;
use Modules\Personal\Auth\Model\BaseAuth;

class GetBaseAuth
{
    public function __invoke(array $attributes): BaseAuth
    {
        $baseAuth = BaseAuth::whereEmail($attributes['email'])->first();

        if (! $baseAuth) {
            $this->throwValidationException();
        }

        if (! Hash::check($attributes['password'], $baseAuth->password)) {
            $this->throwValidationException();
        }

        return $baseAuth;
    }

    private function throwValidationException(): void
    {
        // fixme временное решение для имитации валидации
        throw new Exception('Пароль и мэил не совпали');
    }
}
