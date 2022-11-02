<?php

declare(strict_types=1);

namespace Domain\Personal\Values\BaseAuth\Password;

use App\Base\Tests\UnitCase;
use App\Values\InvalidValueObject;
use Illuminate\Support\Str;

final class BcryptHashedPasswordTest extends UnitCase
{
    public function testHashPassword()
    {
        $value = Str::random(random_int(8, 255));
        $password = RawPassword::newHashed($value);
        $this->assertTrue($password->check($value));
    }

    public function testInvalidHashPassword()
    {
        $value = Str::random(7);
        $password = RawPassword::newHashed($value);
        $this->assertInstanceOf(InvalidValueObject::class, $password);
    }
}
