<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Model\Values\Password;

use Core\Base\Model\Values\InvalidValueObject;
use Core\Base\Test\UnitCase;
use Illuminate\Support\Str;

final class BcryptHashedPasswordTest extends UnitCase
{
    public function testHashPassword()
    {
        $value = Str::random(random_int(8, 255));
        $password = RawPassword::newBcryptHashed($value);
        $this->assertTrue($password->check(RawPassword::new($value)));
    }

    public function testInvalidHashPassword()
    {
        $value = Str::random(7);
        $password = RawPassword::newBcryptHashed($value);
        $this->assertInstanceOf(InvalidValueObject::class, $password);
    }
}
