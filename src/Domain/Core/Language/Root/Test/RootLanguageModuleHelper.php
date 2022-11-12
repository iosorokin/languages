<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Test;

use App\Base\Helpers\ModuleHelper;
use App\Model\Roles\Root;
use Domain\Core\Language\Root\Control\Commands\RootCreateLanguage;
use Domain\Core\Language\Root\Control\Commands\RootCreateLanguageHandler;
use Domain\Core\Language\Root\Control\Commands\RootDeleteLanguage;
use Domain\Core\Language\Root\Control\Commands\RootUpdateLanguage;
use Domain\Core\Language\Root\Control\Queries\RootFindLanguage;
use Domain\Core\Language\Root\Control\Queries\RootGetLanguages;
use Domain\Core\Language\Root\RootLanguageModule;
use Domain\Core\Language\Root\RootLanguageModuleProd;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguage;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguageFactory;
use Domain\Core\Language\Root\Model\Collections\Languages;
use Generator;
use Illuminate\Support\Str;

final class RootLanguageModuleHelper extends ModuleHelper
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
        $command = new RootCreateLanguage($attributes);

        return $command;
    }

    public function getUpdateLanguageCommand(array $overwrite = []): RootUpdateLanguage
    {
        $attributes = $overwrite + $this->generateAttributes();
        $command = new RootUpdateLanguage($attributes);

        return $command;
    }

    public function getDeleteLanguageCommand(array $attributes): RootDeleteLanguage
    {
        $command = new RootDeleteLanguage($attributes);

        return $command;
    }

    public function getFindLanguageQuery(array $attributes): RootFindLanguage
    {
        $query = RootFindLanguage::new($attributes);

        return $query;
    }

    public function getLanguagesQuery(array $attributes = []): RootGetLanguages
    {
        $query = new RootGetLanguages($attributes);

        return $query;
    }

    public function createAggregate(array $overwrite = []): RootLanguage
    {
        $attributes = $overwrite + $this->generateFullAttributes();
        $language = $this->factory()->restoreFromArray($attributes);

        return $language;
    }

    public function createCollection(int $count, array $overwrite = []): Languages
    {
        $languages = collect();
        for ($i = 0; $i < 100; $i++) {
            $language = $this->createAggregate($overwrite);
            $languages->push($language);
        }

        return new Languages($languages);
    }

    public function createFromAction(Root $root, int $count = 1, array $overwrite = []): Generator
    {
        /** @var RootCreateLanguageHandler $handler */
        $handler = app()->make(RootCreateLanguageHandler::class);

        for ($i = 0; $i < $count; $i++) {
            $attributes = $overwrite + $this->generateAttributes();
            $command = $this->getCreateLanguageCommand($attributes);

            yield $handler($root, $command);
        }
    }

    public function factory(): RootLanguageFactory
    {
        return app()->make(RootLanguageFactory::class);
    }

    public function module(): RootLanguageModule
    {
        return app()->make(RootLanguageModuleProd::class);
    }
}
