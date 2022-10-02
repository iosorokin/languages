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

        $helper->create(overwrite: [
            'name' => 'Супер админ для теста',
            'email' => BaseAuthApiHelper::SEEDED_TEST_SUPER_ADMIN['email'],
            'password' => BaseAuthApiHelper::SEEDED_TEST_SUPER_ADMIN['password'],
        ])->current();

        $helper->create(overwrite: [
            'name' => 'Пользователь для теста',
            'email' => BaseAuthApiHelper::SEEDED_TEST_USER['email'],
            'password' => BaseAuthApiHelper::SEEDED_TEST_USER['password'],
        ])->current();

        foreach ($helper->create(self::COUNT_LEARNERS) as $_) {};
    }
}
