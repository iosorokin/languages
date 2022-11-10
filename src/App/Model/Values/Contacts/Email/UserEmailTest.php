<?php

declare(strict_types=1);

namespace App\Model\Values\Contacts\Email;

use App\Base\Tests\TestCase;

final class UserEmailTest extends TestCase
{
    public function testSetValue()
    {
        $value = $this->faker->email;
        $email = UserEmail::new($value);
        $this->assertSame($value, (string) $email);
    }
}
