<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Model\Value\Code;

use App\Base\Test\UnitCase;
use App\Exceptions\InvalidArgumentException;
use Illuminate\Support\Str;

final class CodeTest extends UnitCase
{
    public function testCreate()
    {
        $code = Str::random(random_int(2, 4));
        $vo = CodeImp::new($code);
        $this->assertSame($code, $vo->get());
    }

    public function testMinLengthError()
    {
        $invalidValue = 1;
        $expect = serialize([
            "code.min.2.receive.$invalidValue"
        ]);
        $code = Str::random($invalidValue);
        $vo = CodeImp::new($code);
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
            "code.max.4.receive.$invalidValue"
        ]);
        $code = Str::random($invalidValue);
        $vo = CodeImp::new($code);
        try {
            $vo->get();
        } catch (InvalidArgumentException $e) {
            $actual = $e->getMessage();
        }

        $this->assertSame($expect, $actual);
    }
}
