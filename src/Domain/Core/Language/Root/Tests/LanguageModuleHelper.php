<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Tests;

use App\Base\Helpers\ModuleHelper;
use Domain\Core\Language\Base\Controll\Commands\Language\CreateLanguageCommand;
use Domain\Core\Language\Base\Controll\Commands\Language\DeleteLanguageCommand;
use Domain\Core\Language\Base\Controll\Commands\Language\UpdateLanguageCommand;
use Domain\Core\Language\Root\Control\Commands\RootCreateLanguage;
use Domain\Core\Language\Root\Control\Commands\RootDeleteLanguage;
use Domain\Core\Language\Root\Control\Commands\RootUpdateLanguage;
use Domain\Core\Language\Root\Control\Commands\SeedLanguage;
use Domain\Core\Language\Root\Control\Queries\RootFindLanguage;
use Domain\Core\Language\Root\Control\Queries\RootGetLanguages;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguage;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguageFactory;
use Domain\Core\Language\Root\RootLanguageModule;
use Domain\Core\Language\Root\RootLanguageModuleProd;
use Generator;
use Illuminate\Support\Str;
use Infrastructure\Database\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;

final class LanguageModuleHelper extends ModuleHelper
{
    public function generateAttributes(): array
    {
        return [
            'name' => Str::random(),
            'native_name' => $this->faker()->unique()->sentence(),
            'code' => $this->faker()->unique()->languageCode(),
        ];
    }

    public function generateFullAttributes(): array
    {
        $attributes = [
            'id' => random_int(1, 1000),
            'is_active' => (bool) random_int(0, 1),
            'owner' => random_int(1, 1000),
            'created_at' => now(),
        ];

        return $attributes + $this->generateAttributes();
    }

    public function getCreateLanguageCommand(array $overwrite = []): RootCreateLanguage
    {
        $attributes = $overwrite + $this->generateAttributes();
        $command = new CreateLanguageCommand($attributes);

        return $command;
    }

    public function getUpdateLanguageCommand(array $overwrite = []): RootUpdateLanguage
    {
        $attributes = $overwrite + $this->generateAttributes();
        $command = new UpdateLanguageCommand($attributes);

        return $command;
    }

    public function getDeleteLanguageCommand(array $attributes): RootDeleteLanguage
    {
        $command = new DeleteLanguageCommand($attributes);

        return $command;
    }

    public function getFindLanguageQuery(array $attributes): RootFindLanguage
    {
        $query = new RootFindLanguage($attributes);

        return $query;
    }

    public function getLanguagesQuery(array $attributes = []): RootGetLanguages
    {
        $query = new RootGetLanguages($attributes);

        return $query;
    }

    public function create(array $overwrite = []): RootLanguage
    {
        $attributes = $overwrite + $this->generateFullAttributes();
        $language = $this->factory()->restoreFromArray($attributes);

        return $language;
    }

    public function createFromAction(EloquentUserModel|int $user, int $count = 1, array $overwrite = []): Generator
    {
        $presenter = $this->seedHandler();

        for ($i = 0; $i < $count; $i++) {
            $attributes = $overwrite + $this->generateAttributes();

            yield $presenter->create($user, $attributes);
        }
    }

    public function updateFromAction(EloquentUserModel|int $user, LanguageModel|int $language, array $attributes): void
    {
        $presenter = $this->seedHandler();

        $presenter->update($user, $language, $attributes);
    }

    public function factory(): RootLanguageFactory
    {
        return app()->make(RootLanguageFactory::class);
    }

    private function seedHandler(): SeedLanguage
    {
        return app()->make(SeedLanguage::class);
    }

    public function module(): RootLanguageModule
    {
        return app()->make(RootLanguageModuleProd::class);
    }
}
