<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Test;

use App\Base\Helpers\ModuleHelper;
use App\Model\Roles\Root;
use Domain\Core\Language\Root\Control\Commands\CreateLanguage;
use Domain\Core\Language\Root\Control\Commands\CreateLanguageHandler;
use Domain\Core\Language\Root\Control\Commands\DeleteLanguage;
use Domain\Core\Language\Root\Control\Commands\UpdateLanguage;
use Domain\Core\Language\Root\Control\Queries\RootFindLanguageImp;
use Domain\Core\Language\Root\Control\Queries\RootGetLanguagesImp;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguageImp;
use Domain\Core\Language\Root\Model\Collections\RootLanguages;
use Domain\Core\Language\Root\RootLanguageModule;
use Domain\Core\Language\Root\RootLanguageModuleImp;
use Generator;
use Illuminate\Support\Str;

final class RootLanguageModuleHelper extends ModuleHelper
{
    public function generateAttributes(): array
    {
        return [
            'name' => Str::random(random_int(2, 32)),
            'native_name' => Str::random(random_int(2, 32)),
            'code' => Str::random(random_int(2, 4)),
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

    public function getCreateLanguageCommand(array $overwrite = []): CreateLanguage
    {
        $attributes = $overwrite + $this->generateAttributes();
        $command = new CreateLanguage($attributes);

        return $command;
    }

    public function getUpdateLanguageCommand(array $overwrite = []): UpdateLanguage
    {
        $attributes = $overwrite + $this->generateAttributes();
        $command = new UpdateLanguage($attributes);

        return $command;
    }

    public function getDeleteLanguageCommand(array $attributes): DeleteLanguage
    {
        $command = new DeleteLanguage($attributes);

        return $command;
    }

    public function getFindLanguageQuery(array $attributes): RootFindLanguageImp
    {
        $query = RootFindLanguageImp::new($attributes);

        return $query;
    }

    public function getLanguagesQuery(array $attributes = []): RootGetLanguagesImp
    {
        $query = new RootGetLanguagesImp($attributes);

        return $query;
    }

    public function createAggregate(array $overwrite = []): RootLanguageImp
    {
        $attributes = $overwrite + $this->generateFullAttributes();
        $language = RootLanguageImp::restoreFromArray($attributes);

        return $language;
    }

    public function createCollection(int $count, array $overwrite = []): RootLanguages
    {
        $languages = collect();
        for ($i = 0; $i < 100; $i++) {
            $language = $this->createAggregate($overwrite);
            $languages->push($language);
        }

        return new RootLanguages($languages);
    }

    public function createFromAction(Root $root, int $count = 1, array $overwrite = []): Generator
    {
        /** @var CreateLanguageHandler $handler */
        $handler = app()->make(CreateLanguageHandler::class);

        for ($i = 0; $i < $count; $i++) {
            $attributes = $overwrite + $this->generateAttributes();
            $command = $this->getCreateLanguageCommand($attributes);

            yield $handler($root, $command);
        }
    }

    public function module(): RootLanguageModule
    {
        return app()->make(RootLanguageModuleImp::class);
    }
}
