<?php

declare(strict_types=1);

namespace App\Tests\Helpers;

use App\Base\Helpers\ApiHelper;
use App\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;
use Domain\Core\Language\Root\Tests\LanguageModuleHelper;
use Illuminate\Testing\TestResponse;

final class LanguageManagerApiHelper extends ApiHelper
{
    public function adminCreate(array $attributes = []): TestResponse
    {
        $attributes = LanguageModuleHelper::new()->generateAttributes() + $attributes;

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

    public function adminShow(LanguageModel|int $language, array $attributes = []): TestResponse
    {
        $attributes['language_id'] = is_int($language) ? $language : $language->getId();

        return $this->testCase->getJson(route('api.admin.languages.show', $attributes));
    }

    public function userShow(LanguageModel|int $language, array $attributes = []): TestResponse
    {
        $attributes['language_id'] = is_int($language) ? $language : $language->getId();

        return $this->testCase->getJson(route('api.user.languages.show', $attributes));
    }

    public function guestShow(LanguageModel|int $language, array $attributes = []): TestResponse
    {
        $attributes['language_id'] = is_int($language) ? $language : $language->getId();

        return $this->testCase->getJson(route('api.languages.show', $attributes));
    }

    public function adminUpdate(LanguageModel|int $language, array $attributes = []): TestResponse
    {
        $attributes['language_id'] = is_int($language) ? $language : $language->getId();

        return $this->testCase->putJson(route('api.admin.languages.update', $attributes));
    }

    public function adminDelete(LanguageModel|int $language): TestResponse
    {
        $attributes['language_id'] = is_int($language) ? $language : $language->getId();

        return $this->testCase->deleteJson(route('api.admin.languages.destroy', $attributes));
    }

    public function userAddToFavorite(LanguageModel|int $language): TestResponse
    {
        $attributes['language_id'] = is_int($language) ? $language : $language->getId();

        return $this->testCase->postJson(route('api.user.languages.favorites.store', $attributes));
    }

    public function userRemoveFromFavorite(LanguageModel|int $language, int $favoriteId): TestResponse
    {
        $attributes['language_id'] = is_int($language) ? $language : $language->getId();
        $attributes['favorite_id'] = $favoriteId;

        return $this->testCase->deleteJson(route('api.user.languages.favorites.destroy', $attributes));
    }
}
