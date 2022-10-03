<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Tests;

use Illuminate\Database\Seeder;

final class RuleSeeder extends Seeder
{
    public function run()
    {
        $ruleHelper = RuleHelper::new();
        for ($userId = 2; $userId <= config('seed.users.count_random_users'); $userId++) {
            for ($languageId = 1; $languageId <= config('seed.languages.count'); $languageId++) {
                $chance = random_int(1, 100);
                if ($chance > config('seed.languages.chance_to_learn_language')) continue;
                $count = random_int(
                    config('seed.rules.count_for_user.min'),
                    config('seed.rules.count_for_user.max')
                );

                foreach ($ruleHelper->create($userId, $languageId, $count) as $_) {}
            }
        }
    }
}
