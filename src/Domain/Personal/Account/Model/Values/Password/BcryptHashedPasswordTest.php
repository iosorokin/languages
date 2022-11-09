<?php

declare(strict_types=1);

namespace Domain\Personal\Account\Model\Values\Password;

use App\Base\Tests\UnitCase;
use App\Values\InvalidValueObject;
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
