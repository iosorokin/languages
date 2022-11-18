<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Model\Value\Name;

use App\Base\Tests\UnitCase;
use App\Exceptions\InvalidArgumentException;
use Illuminate\Support\Str;

final class NameTest extends UnitCase
{
    public function testCreate()
    {
        $code = Str::random(random_int(2, 32));
        $vo = NameImp::new($code);
        $this->assertSame($code, $vo->get());
    }

    public function testMinLengthError()
    {
        $invalidValue = 1;
        $expect = serialize([
            "name.min.2.receive.$invalidValue"
        ]);
        $code = Str::random($invalidValue);
        $vo = NameImp::new($code);
        try {
            $vo->get();
        } catch (InvalidArgumentException $e) {
            $actual = $e->getMessage();
        }

        $this->assertSame($expect, $actual);
    }

    public function testMaxLengthError()
    {
        $invalidValue = 64;
        $expect = serialize([
            "name.max.32.receive.$invalidValue"
        ]);
        $code = Str::random($invalidValue);
        $vo = NameImp::new($code);
        try {
            $vo->get();
        } catch (InvalidArgumentException $e) {
            $actual = $e->getMessage();
        }

        $this->assertSame($expect, $actual);
    }
}
