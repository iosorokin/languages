<?php

declare(strict_types=1);

namespace Domain\Personal\Values\BaseAuth\Email;

use App\Base\Tests\TestCase;

final class UserEmailTest extends TestCase
{
    public function testSetValue()
    {
        $value = $this->faker->email;
        $email = new UserEmail($value);
        $this->assertSame($value, (string) $email);
    }
}
