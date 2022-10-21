<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Helpers;

use Core\Base\Helpers\ApiHelper;
use Illuminate\Testing\TestResponse;
use Modules\Domain\Languages\Structures\Language;

final class LanguageApiHelper extends ApiHelper
{
    public function adminCreate(array $attributes = []): TestResponse
    {
        $attributes = LanguageSeedHelper::new()->generateAttributes() + $attributes;

        return $this->testCase->postJson(route('api.admin.languages.store'), $attributes);
    }

    public function guestIndex(array $attributes = []): TestResponse
    {
        return $this->testCase->getJson(route('api.languages.index', $attributes));
    }

    public function userIndex(array $attributes = []): TestResponse
    {
        return $this->testCase->getJson(route('api.user.languages.index', $attributes));
    }

    public function adminIndex(array $attributes = []): TestResponse
    {
        return $this->testCase->getJson(route('api.admin.languages.index'));
    }

    public function adminShow(Language|int $language, array $attributes = []): TestResponse
    {
        $attributes['language_id'] = is_int($language) ? $language : $language->getId();

        return $this->testCase->getJson(route('api.admin.languages.show', $attributes));
    }

    public function userShow(Language|int $language, array $attributes = []): TestResponse
    {
        $attributes['language_id'] = is_int($language) ? $language : $language->getId();

        return $this->testCase->getJson(route('api.user.languages.show', $attributes));
    }

    public function guestShow(Language|int $language, array $attributes = []): TestResponse
    {
        $attributes['language_id'] = is_int($language) ? $language : $language->getId();

        return $this->testCase->getJson(route('api.languages.show', $attributes));
    }

    public function adminUpdate(Language|int $language, array $attributes = []): TestResponse
    {
        $attributes['language_id'] = is_int($language) ? $language : $language->getId();

        return $this->testCase->putJson(route('api.admin.languages.update', $attributes));
    }

    public function adminDelete(Language|int $language): TestResponse
    {
        $attributes['language_id'] = is_int($language) ? $language : $language->getId();

        return $this->testCase->deleteJson(route('api.admin.languages.destroy', $attributes));
    }

    public function userAddToFavorite(Language|int $language): TestResponse
    {
        $attributes['language_id'] = is_int($language) ? $language : $language->getId();

        return $this->testCase->postJson(route('api.user.languages.favorites.store', $attributes));
    }

    public function userRemoveFromFavorite(Language|int $language, int $favoriteId): TestResponse
    {
        $attributes['language_id'] = is_int($language) ? $language : $language->getId();
        $attributes['favorite_id'] = $favoriteId;

        return $this->testCase->deleteJson(route('api.user.languages.favorites.destroy', $attributes));
    }
}
