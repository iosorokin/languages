<?php

namespace Modules\Personal\Auth\Services\Sanctum\Repositories;

use App\Extensions\Assert;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\PersonalAccessToken;

class SanctumApiTokenRepository
{
    public function add(mixed $token): void
    {
        Assert::isInstanceOf($token,PersonalAccessToken::class);
        /** @var PersonalAccessToken $token */
        $token->save();
    }
}
