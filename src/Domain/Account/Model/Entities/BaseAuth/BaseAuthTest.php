<?php

declare(strict_types=1);

namespace Domain\Account\Model\Entities\BaseAuth;

use App\Base\Tests\TestCase;

final class BaseAuthTest extends TestCase
{
    public function testSetValue()
    {
        $baseAuth = new BaseAuth();

        $this->assertSame(
            ['email', 'password'],
            array_keys($baseAuth->toArray()),
        );
    }
}
