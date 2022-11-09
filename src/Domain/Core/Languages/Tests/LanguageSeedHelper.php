<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Tests;

use App\Base\Helpers\AppHelper;
use App\Dto\Language\CreateLanguage;
use App\Dto\Language\RestoreLanguage;
use App\Dto\Language\UpdateLanguage;
use App\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;
use Domain\Core\Languages\Actions\Manager\Dto\CreateLanguageDto;
use Domain\Core\Languages\Actions\Manager\Dto\UpdateLanguageDto;
use Domain\Core\Languages\Actions\SeedLanguage;
use Domain\Core\Languages\LanguageModule;
use Domain\Core\Languages\LanguageModuleProd;
use Domain\Core\Languages\Model\Agregates\Language\Language;
use Domain\Core\Languages\Model\Agregates\Language\LanguageFactory;
use Generator;
use Illuminate\Support\Str;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;

final class LanguageSeedHelper extends AppHelper
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

    public function factory(): LanguageFactory
    {
        return app()->make(LanguageFactory::class);
    }

    public function getCreateLanguageDto(array $overwrite = []): CreateLanguageDto
    {
        $attributes = $overwrite + $this->generateAttributes();
        $dto = new CreateLanguage($attributes);

        return $dto;
    }

    public function getUpdateLanguageDto(array $overwrite = []): UpdateLanguageDto
    {
        $attributes = $overwrite + $this->generateAttributes();
        $dto = new UpdateLanguage($attributes);

        return $dto;
    }

    public function create(array $overwrite = []): Language
    {
        $attributes = $overwrite + $this->generateFullAttributes();
        $dto = new RestoreLanguage($attributes);
        $language = $this->factory()->restore($dto);

        return $language;
    }

    public function createFromAction(EloquentUserModel|int $user, int $count = 1, array $overwrite = []): Generator
    {
        $presenter = $this->presenter();

        for ($i = 0; $i < $count; $i++) {
            $attributes = $overwrite + $this->generateAttributes();

            yield $presenter->create($user, $attributes);
        }
    }

    public function updateFromAction(EloquentUserModel|int $user, LanguageModel|int $language, array $attributes): void
    {
        $presenter = $this->presenter();

        $presenter->update($user, $language, $attributes);
    }

    private function presenter(): SeedLanguage
    {
        return app()->make(SeedLanguage::class);
    }

    public function module(): LanguageModule
    {
        return app()->make(LanguageModuleProd::class);
    }
}
