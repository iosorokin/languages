<?php

declare(strict_types=1);

namespace Domain\Account\Actions\Auth;

use App\Base\Tests\UnitCase;
use Domain\Account\Helpers\Test\AccountSeedHelper;
use Domain\Account\Helpers\Test\BaseAuthSeedHelper;
use Domain\Account\Repositories\AccountRepository;
use Domain\Account\Services\Auth\AuthService;
use Illuminate\Support\Str;

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
