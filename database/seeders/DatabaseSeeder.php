<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Domain\Analysis\Tests\AnalysisAppHelper;
use Modules\Domain\Chapters\Tests\ChapterAppHelper;
use Modules\Domain\Languages\Helpers\LanguageAppHelper;
use Modules\Domain\Sentences\Structures\Sentence;
use Modules\Domain\Sentences\Tests\SentenceHelper;
use Modules\Domain\Sources\Structures\Source;
use Modules\Domain\Sources\Tests\SourceHelper;
use Modules\Personal\Permissions\Enums\PermissionType;
use Modules\Personal\User\Structures\User;
use Modules\Personal\User\Tests\UserHelper;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $root = $this->createRoot();
        $testUser = $this->createTestUser();
        $languageIds = $this->createLanguages($root);

        $this->seedContent($testUser, $languageIds);

        $attributes = [
            'permissions' => [
                PermissionType::User->value
            ]
        ];
        foreach (UserHelper::new()->create(config('seed.users.count_random_users'), $attributes) as $user) {
            $this->seedContent($user, $languageIds);
        }
    }

    private function createRoot(): User
    {
        $helper = UserHelper::new();
        $user = $helper->createRoot();

        return $user;
    }

    private function createTestUser(): User
    {
        $helper = UserHelper::new();
        $user = $helper->create(overwrite: [
            'name' => 'Пользователь для теста',
            'email' => config('seed.users.test_user.email'),
            'password' => config('seed.users.test_user.password'),
            'permissions' => [
                PermissionType::User->value
            ]
        ])->current();

        return $user;
    }

    private function createLanguages(User $user): array
    {
        $helper = LanguageAppHelper::new();
        $generator = $helper->create(
            user: $user,
            count: config('seed.languages.count')
        );

        $activeIds = [];
        foreach ($generator as $language) {
            $chance = random_int(1, 100);
            if ($chance < 80) {
                $helper->update($user, $language, [
                    'is_active' => true,
                ]);
                $activeIds[] = $language->getId();
            }
        }

        return $activeIds;
    }

    private function seedContent(User $user, array $languageIds)
    {
        foreach ($languageIds as $languageId) {
            $chance = (float) random_int(1, 100000) / 100;
            if ($chance > (float) config('seed.languages.chance_to_learn_language')) continue;

            $this->seedSources($user, $languageId);
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
            $this->seedChapters($user, $source);
            $this->seedSentences($user, $source);
        }
    }

    private function seedChapters(User $user, Source $source): void
    {
        $chapterAppHelper = ChapterAppHelper::new();
        $count = random_int(
            config('seed.chapters.count_for_source.min'),
            config('seed.chapters.count_for_source.max')
        );

        foreach ($chapterAppHelper->create($source, $count) as $chapter) {
            $this->seedSentences($user, $source, [
                'chapter_id' => $chapter->getId(),
            ]);
        }
    }

    private function seedSentences(User $user, Source $source, array $attributes = []): void
    {
        $sentenceHelper = SentenceHelper::new();
        $count = random_int(
            config('seed.sentences.count_for_source.min'),
            config('seed.sentences.count_for_source.max')
        );

        foreach ($sentenceHelper->create($user, $source, $count, $attributes) as $sentence) {
            $this->seedAnalysis($user, $sentence);
        }
    }

    private function seedAnalysis(User $user, Sentence $sentence, array $overwrite = []): void
    {
        $analysisHelper = AnalysisAppHelper::new();
        $chance = random_int(1, 100);
        if ($chance < config('seed.analysis.chance')) {
            $analysisHelper->create($user, $sentence, $overwrite);
        }
    }
}
