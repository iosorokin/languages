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
        $attributes = LanguageAppHelper::new()->generateAttributes() + $attributes;

        return $this->testCase->postJson(route('api.admin.languages.store'), $attributes);
    }

    public function guestIndex(array $attributes = []): TestResponse
    {
        return $this->testCase->getJson(route('api.languages.index', $attributes));
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
}