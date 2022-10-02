<?php

declare(strict_types=1);

namespace Modules\Personal\User\Tests;

use Illuminate\Database\Seeder;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

final class UserSeeder extends Seeder
{
    private const COUNT_LEARNERS = 99;

    public function run()
    {
        $helper = UserHelper::new();

        $attributes = [
            'name' => 'Для теста',
            'email' => BaseAuthApiHelper::SEEDED_TEST_USER['email'],
            'password' => BaseAuthApiHelper::SEEDED_TEST_USER['password'],
        ];

        $helper->create(overwrite: $attributes)->current();
        foreach ($helper->create(self::COUNT_LEARNERS) as $_) {};
    }
}
