<?php

declare(strict_types=1);

namespace Domain\Education\Language\Shared\Test;

use Core\Base\Model\Roles\Root;
use Core\Base\Test\Helpers\ModuleHelper;
use Domain\Education\Language\Root\Control\Cases\Dto\CreateLanguageDto;
use Domain\Education\Language\Root\Control\Cases\Dto\DeleteLanguageDto;
use Domain\Education\Language\Root\Control\Cases\Dto\UpdateLanguageDto;
use Domain\Education\Language\Root\RootLanguageModule;
use Domain\Education\Language\Root\RootLanguageModuleImp;
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

    public function getCreateLanguageCommand(array $overwrite = []): CreateLanguageDto
    {
        $attributes = $overwrite + $this->generateAttributes();
        $command = new CreateLanguageDto($attributes);

        return $command;
    }

    public function getUpdateLanguageCommand(array $overwrite = []): UpdateLanguageDto
    {
        $attributes = $overwrite + $this->generateAttributes();
        $command = new UpdateLanguageDto($attributes);

        return $command;
    }

    public function getDeleteLanguageCommand(array $attributes): DeleteLanguageDto
    {
        $command = new DeleteLanguageDto($attributes);

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
        /** @var CreateLanguage $handler */
        $handler = app()->make(CreateLanguage::class);

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
