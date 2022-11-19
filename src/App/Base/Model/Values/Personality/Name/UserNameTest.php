<?php

declare(strict_types=1);

namespace App\Base\Model\Values\Personality\Name;

use App\Base\Test\UnitCase;
use Illuminate\Support\Str;

final class UserNameTest extends UnitCase
{
    public function testSetValue()
    {
        $value = Str::random();
        $name = NameImp::new($value);
        $this->assertSame($value, (string) $name);
    }
}
