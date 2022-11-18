<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Model\Value\NativeName;

use App\Base\Tests\UnitCase;
use App\Exceptions\InvalidArgumentException;
use Illuminate\Support\Str;

final class NativeNameTest extends UnitCase
{
    public function testCreate()
    {
        $code = Str::random(random_int(2, 32));
        $vo = NativeNameImp::new($code);
        $this->assertSame($code, $vo->get());
    }

    public function testMinLengthError()
    {
        $invalidValue = 1;
        $expect = serialize([
            "native_name.min.2.receive.$invalidValue"
        ]);
        $code = Str::random($invalidValue);
        $vo = NativeNameImp::new($code);
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
            "native_name.max.32.receive.$invalidValue"
        ]);
        $code = Str::random($invalidValue);
        $vo = NativeNameImp::new($code);
        try {
            $vo->get();
        } catch (InvalidArgumentException $e) {
            $actual = $e->getMessage();
        }

        $this->assertSame($expect, $actual);
    }
}
