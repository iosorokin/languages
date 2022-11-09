<?php

declare(strict_types=1);

namespace Domain\Manager\Languages\Tests;

use App\Base\Helpers\ModuleHelper;
use App\Controll\Commands\Language\CreateBaseLanguageCommand;
use App\Controll\Commands\Language\DeleteLanguageCommand;
use App\Controll\Commands\Language\RestoreLanguageCommand;
use App\Controll\Commands\Language\UpdateLanguageCommand;
use App\Controll\Queries\Languages\FindLanguageQuery;
use App\Controll\Queries\Languages\GetLanguagesQuery;
use App\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;
use Domain\Core\Languages\Model\Manager\Aggregates\Manager\LanguageFactory;
use Domain\Core\Languages\Model\Manager\Aggregates\Manager\ManagerLanguage;
use Domain\Core\Languages\Model\Manager\Commands\Manager\CreateLanguage;
use Domain\Core\Languages\Model\Manager\Commands\Manager\DeleteLanguage;
use Domain\Core\Languages\Model\Manager\Commands\Manager\UpdateLanguage;
use Domain\Core\Languages\Model\Manager\Commands\SeedLanguage;
use Domain\Core\Languages\Model\Manager\Queries\FindLanguage;
use Domain\Core\Languages\Model\Manager\Queries\GetLanguages;
use Domain\Manager\Languages\LanguageManagerModule;
use Domain\Manager\Languages\LanguageManagerModuleProd;
use Generator;
use Illuminate\Support\Str;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;

final class LanguageManagerModuleHelper extends ModuleHelper
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
        $command = new CreateBaseLanguageCommand($attributes);

        return $command;
    }

    public function getUpdateLanguageCommand(array $overwrite = []): UpdateLanguage
    {
        $attributes = $overwrite + $this->generateAttributes();
        $command = new UpdateLanguageCommand($attributes);

        return $command;
    }

    public function getDeleteLanguageCommand(array $attributes): DeleteLanguage
    {
        $command = new DeleteLanguageCommand($attributes);

        return $command;
    }

    public function getFindLanguageQuery(array $attributes): FindLanguage
    {
        $query = new FindLanguageQuery($attributes);

        return $query;
    }

    public function getLanguagesQuery(array $attributes = []): GetLanguages
    {
        $query = new GetLanguagesQuery($attributes);

        return $query;
    }

    public function create(array $overwrite = []): ManagerLanguage
    {
        $attributes = $overwrite + $this->generateFullAttributes();
        $dto = new RestoreLanguageCommand($attributes);
        $language = $this->factory()->restore($dto);

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

    public function module(): LanguageManagerModule
    {
        return app()->make(LanguageManagerModuleProd::class);
    }
}
