<?php

declare(strict_types=1);

namespace Core\Base\Model\Values\Personality\Name;

use Core\Base\Test\UnitCase;
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
