<?php

namespace Database\Seeders;

use App\Helpers\Test\UserSeedHelper;
use Illuminate\Database\Seeder;
use Modules\Core\Analysis\Helpers\AnalysisSeedHelper;
use Modules\Core\Chapters\Helpers\ChapterSeedHelper;
use Modules\Core\Languages\Application\Helpers\LanguageSeedHelper;
use Modules\Core\Sentences\Model\Sentence;
use Modules\Core\Sentences\Tests\SentenceHelper;
use Modules\Core\Sources\Helpers\SourceSeedHelper;
use Modules\Core\Sources\Structures\Source;
use Modules\Personal\Domain\Entity\User;
use Modules\Personal\Domain\Enums\Role;
use Modules\Personal\Infrastructure\Repository\EloquentUserModel;

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
//        $languageIds = $this->createLanguages($root);
//
//        $this->seedContent($testUser, $languageIds);
//
//        $attributes = [
//            'roles' => [
//                Role::User->value
//            ]
//        ];
//        foreach (UserSeedHelper::new()->create(config('seed.users.count_random_users'), $attributes) as $user) {
//            $this->seedContent($user, $languageIds);
//        }
    }

    private function createRoot(): User
    {
        $helper = UserSeedHelper::new();
        $user = $helper->createRoot();

        return $user;
    }

    private function createTestUser(): User
    {
        $helper = UserSeedHelper::new();
        $user = $helper->create(overwrite: [
            'name' => 'Пользователь для теста',
            'email' => config('seed.users.test_user.email'),
            'password' => config('seed.users.test_user.password'),
            'roles' => [
                Role::User->value
            ]
        ])->current();

        return $user;
    }

    private function createLanguages(EloquentUserModel $user): array
    {
        $helper = LanguageSeedHelper::new();
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

    private function seedContent(EloquentUserModel $user, array $languageIds)
    {
        foreach ($languageIds as $languageId) {
            $chance = (float) random_int(1, 100000) / 100;
            if ($chance > (float) config('seed.languages.chance_to_learn_language')) continue;

            $this->seedSources($user, $languageId);
        }
    }

    private function seedSources(EloquentUserModel $user, int $languageId): void
    {
        $sourceHelper = SourceSeedHelper::new();
        $count = random_int(
            config('seed.sources.count_for_user.min'),
            config('seed.sources.count_for_user.max')
        );

        foreach ($sourceHelper->create($user, $languageId, $count) as $source) {
            $this->seedChapters($user, $source);
            $this->seedSentences($user, $source);
        }
    }

    private function seedChapters(EloquentUserModel $user, Source $source): void
    {
        $chapterAppHelper = ChapterSeedHelper::new();
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

    private function seedSentences(EloquentUserModel $user, Source $source, array $attributes = []): void
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

    private function seedAnalysis(EloquentUserModel $user, Sentence $sentence, array $overwrite = []): void
    {
        $analysisHelper = AnalysisSeedHelper::new();
        $chance = random_int(1, 100);
        if ($chance < config('seed.analysis.chance')) {
            $analysisHelper->create($user, $sentence, $overwrite);
        }
    }
}
