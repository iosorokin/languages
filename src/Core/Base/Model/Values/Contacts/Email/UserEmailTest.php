<?php

declare(strict_types=1);

namespace Core\Base\Model\Values\Contacts\Email;

use Core\Base\Tests\TestCase;

final class UserEmailTest extends TestCase
{
    public function testSetValue()
    {
        $value = $this->faker->email;
        $email = UserEmail::new($value);
        $this->assertSame($value, (string) $email);
    }
}
