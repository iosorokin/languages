<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Education\Dictionary\Tests\DictionaryHelper;
use Modules\Education\Dictionary\Tests\DictionarySeeder;
use Modules\Education\Rules\Tests\RuleHelper;
use Modules\Education\Rules\Tests\RuleSeeder;
use Modules\Education\Sentences\Tests\SentenceHelper;
use Modules\Education\Source\Entities\Source;
use Modules\Education\Source\Tests\SourceHelper;
use Modules\Education\Source\Tests\SourceSeeder;
use Modules\Languages\Tests\LanguageHelper;
use Modules\Languages\Tests\LanguageSeeder;
use Modules\Personal\User\Entities\User;
use Modules\Personal\User\Tests\UserHelper;
use Modules\Personal\User\Tests\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = $this->createSuperAdmin();
        $testUser = $this->createTestUser();
        $languageIds = $this->createLanguages();
        $this->seedContent($testUser, $languageIds);

        foreach (UserHelper::new()->create(config('seed.users.count_random_users')) as $user) {
            $this->seedContent($user, $languageIds);
        }
    }

    private function createSuperAdmin(): User
    {
        $helper = UserHelper::new();
        $user = $helper->create(overwrite: [
            'name' => 'Супер админ для теста',
            'email' => config('seed.users.super_admin.email'),
            'password' => config('seed.users.super_admin.password'),
        ])->current();

        return $user;
    }

    private function createTestUser(): User
    {
        $helper = UserHelper::new();
        $user = $helper->create(overwrite: [
            'name' => 'Пользователь для теста',
            'email' => config('seed.users.test_user.email'),
            'password' => config('seed.users.test_user.password'),
        ])->current();

        return $user;
    }

    private function createLanguages(): array
    {
        $ids = [];
        $generator = LanguageHelper::new()->create(
            userId: 1,
            count: config('seed.languages.count')
        );
        foreach ($generator as $language) {
            $ids[] = $language->getId();
        }

        return $ids;
    }

    private function seedContent(User $user, array $languageIds)
    {
        foreach ($languageIds as $languageId) {
            $chance = random_int(1, 100);
            if ($chance > config('seed.languages.chance_to_learn_language')) continue;

            $this->seedSources($user, $languageId);
            $this->seedDictionaries($user, $languageId);
            $this->seedRules($user, $languageId);
        }
    }

    private function seedSources(User $user, int $languageId): void
    {
        $sourceHelper = SourceHelper::new();
        $count = random_int(
            config('seed.sources.count_for_user.min'),
            config('seed.sources.count_for_user.max')
        );

        foreach ($sourceHelper->create($user, $languageId, $count) as $source) {
            $this->seedSentences($user, $source);
        }
    }

    private function seedDictionaries(User $user, int $languageId): void
    {
        $dictionaryHelper = DictionaryHelper::new();
        $count = random_int(
            config('seed.dictionaries.count_for_user.min'),
            config('seed.dictionaries.count_for_user.max')
        );

        foreach ($dictionaryHelper->create($user, $languageId, $count) as $_) {}
    }

    private function seedRules(User $user, int $languageId): void
    {
        $ruleHelper = RuleHelper::new();
        $count = random_int(
            config('seed.rules.count_for_user.min'),
            config('seed.rules.count_for_user.max')
        );

        foreach ($ruleHelper->create($user, $languageId, $count) as $_) {}
    }

    private function seedSentences(User $user, Source $source): void
    {
        $sentenceHelper = SentenceHelper::new();
        $count = random_int(
            config('seed.sentences.count_for_source.min'),
            config('seed.sentences.count_for_source.max')
        );

        foreach ($sentenceHelper->create($user, $source->getContainer()->getId(), $count) as $sentence) {}
    }
}
