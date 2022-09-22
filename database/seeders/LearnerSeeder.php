<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;
use Modules\Personal\Learner\Tests\LearnerHelper;

class LearnerSeeder extends Seeder
{
    private const COUNT_LEARNERS = 99;

    public function run()
    {
        $helper = LearnerHelper::new();

        $attributes = [
            'name' => 'Для теста',
            'email' => BaseAuthApiHelper::SEEDED_TEST_LEARNER['email'],
            'password' => BaseAuthApiHelper::SEEDED_TEST_LEARNER['password'],
        ];

        $helper->create(overwrite: $attributes)->current();
        foreach ($helper->create(self::COUNT_LEARNERS) as $_) {};
    }
}
