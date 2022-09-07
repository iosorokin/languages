<?php

namespace App\Controllers\Api\Personal\Auth;

use App\Presenters\Personal\Auth\Login\LearnerBaseLogin;
use Illuminate\Http\Request;
use Modules\Personal\Auth\Actions\Auth;

class LearnerBaseLoginController
{
    public function __construct(
        private LearnerBaseLogin $login,
    ) {}

    public function __invoke(Request $request)
    {
        $token = ($this->login)($request->all());

        return $token;
    }
}
