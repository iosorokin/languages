<?php

declare(strict_types=1);

namespace Domain\Personal\Values\Personality\Name;

use App\Base\Tests\UnitCase;
use Illuminate\Support\Str;

final class UserNameTest extends UnitCase
{
    public function testSetValue()
    {
        $value = Str::random();
        $name = new UserName($value);
        $this->assertSame($value, (string) $name);
    }
}
