<?php

namespace Modules\Personal\Auth\Services\Sanctum\Actions;

use App\Extensions\Assert;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\PersonalAccessToken;
use Modules\Personal\Auth\Services\Sanctum\Context\SanctumAuthContext;
use Modules\Personal\Auth\Services\Sanctum\Dto\CreateSanctumTokenDto;

class CreateSanctumToken
{
    public function __invoke(CreateSanctumTokenDto $dto): SanctumAuthContext
    {
        $token = new SanctumAuthContext(new PersonalAccessToken());
        $token->setTokenable($dto->authable);
        $token->setName($dto->name);
        $token->setExpiresAt($dto->expiresAt);

        return $token;
    }
}
