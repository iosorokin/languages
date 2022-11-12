<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Actions\Auth;

use App\Base\Tests\UnitCase;
use Illuminate\Support\Str;
use WIP\Personal\Account\Helpers\Test\AccountSeedHelper;
use WIP\Personal\Account\Helpers\Test\BaseAuthSeedHelper;
use WIP\Personal\Account\Repositories\AccountRepository;
use WIP\Personal\Account\Services\Auth\AuthService;

final class BaseLoginTest extends UnitCase
{
    public function testLogin()
    {
        $repository = $this->mock(AccountRepository::class);
        $account = AccountSeedHelper::new()->makeAccount();
        $repository->shouldReceive('getByEmail')
            ->andReturn($account);
        $expectToken = Str::random();
        $this->mock(AuthService::class)
            ->shouldReceive('login')
            ->andReturn($expectToken);
        $dto = BaseAuthSeedHelper::new()->baseLoginDto([
            'email' => (string) $account->email(),
            'password' => (string) $account->password(),
        ]);
        /** @var BaseLogin $baseLogin */
        $baseLogin = $this->app->make(BaseLogin::class);
        $token = $baseLogin($dto);
        $this->assertSame($expectToken, $token);
    }
}
