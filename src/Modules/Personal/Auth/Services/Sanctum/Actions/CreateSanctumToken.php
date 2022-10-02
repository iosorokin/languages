<?php

namespace Modules\Personal\Auth\Services\Sanctum\Actions;

use App\Extensions\Assert;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\NewAccessToken;
use Modules\Personal\Auth\Services\Sanctum\Dto\CreateSanctumTokenDto;

class CreateSanctumToken
{
    public function __invoke(CreateSanctumTokenDto $dto): NewAccessToken
    {
        /** @var HasApiTokens $user */
        $user = $dto->user;
        Assert::isInstanceOf($user, Model::class);

        return $user->createToken(
            name: $dto->name ?? 'default',
            abilities: $dto->abilities ?? ['*'],
            expiresAt: $dto->expires_at,
        );
    }
}
