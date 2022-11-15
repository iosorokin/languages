<?php

declare(strict_types=1);

namespace Domain\Guest\Core\Language\Tests;

use App\Base\Helpers\ModuleHelper;
use Domain\Guest\Core\Language\Control\Queries\GuestFindLanguage;
use Domain\Guest\Core\Language\Control\Queries\GuestGetLanguages;
use Domain\Guest\Core\Language\GuestLanguageModule;
use Domain\Guest\Core\Language\GuestLanguageModuleProd;
use Domain\Guest\Core\Language\Model\Aggregate\GuestLanguage;
use Domain\Guest\Core\Language\Model\Aggregate\GuestLanguageFactory;
use Domain\Guest\Core\Language\Model\Collection\GuestLanguages;
use Illuminate\Support\Str;

final class GuestLanguageModuleHelper extends ModuleHelper
{
    public function generateFullAttributes(): array
    {
        return [
            'id' => random_int(1, 1000),
            'name' => Str::random(),
            'native_name' => $this->faker()->unique()->sentence(),
            'code' => $this->faker()->unique()->languageCode(),
            'is_active' => true,
        ];
    }

    public function getFindLanguageQuery(array $attributes): GuestFindLanguage
    {
        $query = GuestFindLanguage::new($attributes);

        return $query;
    }

    public function getLanguagesQuery(array $attributes = []): GuestGetLanguages
    {
        $query = new GuestGetLanguages($attributes);

        return $query;
    }

    public function createAggregate(array $overwrite = []): GuestLanguage
    {
        $attributes = $overwrite + $this->generateFullAttributes($overwrite);
        $language = $this->factory()->restoreFromArray($attributes);

        return $language;
    }

    public function createCollection(int $count, array $overwrite = []): GuestLanguages
    {
        $languages = collect();
        for ($i = 0; $i < $count; $i++) {
            $language = $this->createAggregate($overwrite);
            $languages->push($language);
        }

        return new GuestLanguages($languages);
    }

    public function factory(): GuestLanguageFactory
    {
        return app()->make(GuestLanguageFactory::class);
    }

    public function module(): GuestLanguageModule
    {
        return app()->make(GuestLanguageModuleProd::class);
    }
}
