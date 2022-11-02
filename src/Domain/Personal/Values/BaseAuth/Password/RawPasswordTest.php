<?php

declare(strict_types=1);

namespace Domain\Personal\Values\BaseAuth\Password;

use App\Base\Tests\UnitCase;
use App\Values\InvalidValueObject;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Str;

final class RawPasswordTest extends UnitCase
{
    public function testSetMinCorrectPassword()
    {
        $value = Str::random(8);
        $password = RawPassword::new($value);
        $this->assertSame($value, (string) $password);
    }

    public function testSetMaxCorrectPassword()
    {
        $value = Str::random(8);
        $password = RawPassword::new($value);
        $this->assertSame($value, (string) $password);
    }

    public function testSetRandomCorrectPassword()
    {
        $value = Str::random(random_int(8, 255));
        $password = RawPassword::new($value);
        $this->assertSame($value, (string) $password);
    }

    public function testSetShortPassword()
    {
        $value = Str::random(7);
        $password = RawPassword::new($value);
        $this->assertInstanceOf(InvalidValueObject::class, $password);
    }

    public function testSetLongPassword()
    {
        $value = Str::random(256);
        $password = RawPassword::new($value);
        $this->assertInstanceOf(InvalidValueObject::class, $password);
    }
}
