<?php

declare(strict_types=1);

namespace Domain\Personal\Values\BaseAuth;

use App\Base\Tests\TestCase;
use App\Values\Contacts\Email\UserEmail;
use Domain\Personal\Values\BaseAuth\Password\RawPassword;
use Illuminate\Contracts\Hashing\Hasher;

final class BaseAuthTest extends TestCase
{
    public function testSetValue()
    {
        $baseAuth = new BaseAuthImp(
            new UserEmail($this->faker->email),
            new RawPassword($this->faker->password, $this->app->make(Hasher::class)),
        );

        $this->assertSame(
            ['email', 'password'],
            array_keys($baseAuth->toArray()),
        );
    }
}
