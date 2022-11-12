<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Test;

use App\Base\Helpers\ModuleHelper;
use Domain\Core\Language\Root\Control\Commands\CreateLanguage;
use Domain\Core\Language\Root\Control\Commands\CreateLanguage;
use Domain\Core\Language\Root\Control\Commands\DeleteLanguage;
use Domain\Core\Language\Root\Control\Commands\DeleteLanguage;
use Domain\Core\Language\Root\Control\Commands\RootUpdateLanguage;
use Domain\Core\Language\Root\Control\Commands\SeedLanguage;
use Domain\Core\Language\Root\Control\Commands\UpdateLanguage;
use Domain\Core\Language\Root\Control\Queries\FindLanguage;
use Domain\Core\Language\Root\Control\Queries\GetLanguages;
use Domain\Core\Language\Root\LanguageModule;
use Domain\Core\Language\Root\LanguageModuleProd;
use Domain\Core\Language\Root\Model\Aggregates\Language;
use Domain\Core\Language\Root\Model\Aggregates\LanguageFactory;
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

    public function getCreateLanguageCommand(array $overwrite = []): CreateLanguage
    {
        $attributes = $overwrite + $this->generateAttributes();
        $command = new CreateLanguage($attributes);

        return $command;
    }

    public function getUpdateLanguageCommand(array $overwrite = []): RootUpdateLanguage
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

    public function getFindLanguageQuery(array $attributes): FindLanguage
    {
        $query = new FindLanguage($attributes);

        return $query;
    }

    public function getLanguagesQuery(array $attributes = []): GetLanguages
    {
        $query = new GetLanguages($attributes);

        return $query;
    }

    public function create(array $overwrite = []): Language
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

    public function factory(): LanguageFactory
    {
        return app()->make(LanguageFactory::class);
    }

    private function seedHandler(): SeedLanguage
    {
        return app()->make(SeedLanguage::class);
    }

    public function module(): LanguageModule
    {
        return app()->make(LanguageModuleProd::class);
    }
}
