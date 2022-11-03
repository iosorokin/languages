<?php

declare(strict_types=1);

namespace Domain\Personal\Actions\Auth;

use App\Base\Tests\UnitCase;
use Domain\Personal\Helpers\BaseAuthSeedHelper;
use Domain\Personal\Helpers\UserSeedHelper;
use Domain\Personal\Repositories\PersonalRepository;
use Illuminate\Support\Str;
use Infrastructure\Services\Auth\AuthService;

final class BaseLoginTest extends UnitCase
{
    public function testLogin()
    {
        $repository = $this->mock(PersonalRepository::class);
        $user = UserSeedHelper::new()->makeUser();
        $repository->shouldReceive('getByEmail')
            ->andReturn($user);
        $expectToken = Str::random();
        $this->mock(AuthService::class)
            ->shouldReceive('login')
            ->andReturn($expectToken);
        $dto = BaseAuthSeedHelper::new()->baseLoginDto($user->baseAuth()->toArray());
        /** @var BaseLogin $baseLogin */
        $baseLogin = $this->app->make(BaseLogin::class);
        $token = $baseLogin($dto);
        $this->assertSame($expectToken, $token);
    }
}
