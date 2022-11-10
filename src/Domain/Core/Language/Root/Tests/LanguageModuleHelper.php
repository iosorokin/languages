<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Tests;

use App\Base\Helpers\ModuleHelper;
use App\Controll\Commands\Language\CreateLanguageCommand;
use App\Controll\Commands\Language\DeleteLanguageCommand;
use App\Controll\Commands\Language\UpdateLanguageCommand;
use App\Controll\Queries\Languages\RootFindLanguageQuery;
use App\Controll\Queries\Languages\RootGetLanguagesQuery;
use App\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;
use Domain\Core\Language\Root\Control\Commands\RootCreateLanguage;
use Domain\Core\Language\Root\Control\Commands\RootDeleteLanguage;
use Domain\Core\Language\Root\Control\Commands\RootUpdateLanguage;
use Domain\Core\Language\Root\Control\Commands\SeedLanguage;
use Domain\Core\Language\Root\Control\Queries\RootFindLanguage;
use Domain\Core\Language\Root\Control\Queries\RootGetLanguages;
use Domain\Core\Language\Root\LanguageManagerModule;
use Domain\Core\Language\Root\LanguageManagerModuleProd;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguage;
use Domain\Core\Language\Root\Model\Structures\RootLanguageStructure;
use Generator;
use Illuminate\Support\Str;
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
        $query = new RootFindLanguageQuery($attributes);

        return $query;
    }

    public function getLanguagesQuery(array $attributes = []): RootGetLanguages
    {
        $query = new RootGetLanguagesQuery($attributes);

        return $query;
    }

    public function create(array $overwrite = []): RootLanguage
    {
        $attributes = $overwrite + $this->generateFullAttributes();
        $structure = RootLanguageStructure::new($attributes);
        $language = RootLanguage::restore($structure);

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

    private function seedHandler(): SeedLanguage
    {
        return app()->make(SeedLanguage::class);
    }

    public function module(): LanguageManagerModule
    {
        return app()->make(LanguageManagerModuleProd::class);
    }
}