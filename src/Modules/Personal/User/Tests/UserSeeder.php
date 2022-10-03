<?php

declare(strict_types=1);

namespace Modules\Personal\User\Tests;

use Illuminate\Database\Seeder;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

final class UserSeeder extends Seeder
{
    public function run()
    {
        $helper = UserHelper::new();

        $helper->create(overwrite: [
            'name' => 'Супер админ для теста',
            'email' => config('seed.users.super_admin.email'),
            'password' => config('seed.users.super_admin.password'),
        ])->current();

        $helper->create(overwrite: [
            'name' => 'Пользователь для теста',
            'email' => config('seed.users.test_user.email'),
            'password' => config('seed.users.test_user.password'),
        ])->current();

        foreach ($helper->create(config('seed.users.count_random_users')) as $_) {};
    }
}
