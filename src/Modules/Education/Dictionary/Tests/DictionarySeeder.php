<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Tests;

use Illuminate\Database\Seeder;

final class DictionarySeeder extends Seeder
{
    public function run()
    {
        $dictionaryHelper = DictionaryHelper::new();
        for ($userId = 2; $userId < config('seed.users.count_random_users') + 1; $userId++) {
            for ($languageId = 1; $languageId <= config('seed.languages.count'); $languageId++) {
                $chance = random_int(1, 100);
                if ($chance > config('seed.languages.chance_to_learn_language')) continue;
                $count = random_int(
                    config('seed.dictionaries.count_for_user.min'),
                    config('seed.dictionaries.count_for_user.max')
                );

                foreach ($dictionaryHelper->create($userId, $languageId, $count) as $_) {}
            }
        }
    }
}
