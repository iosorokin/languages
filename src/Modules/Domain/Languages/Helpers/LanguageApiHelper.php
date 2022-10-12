<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Helpers;

use Core\Base\Helpers\ApiHelper;
use Illuminate\Testing\TestResponse;

final class LanguageApiHelper extends ApiHelper
{
    public function create(array $attributes = []): TestResponse
    {
        $attributes = LanguageAppHelper::new()->generateAttributes() + $attributes;

        return $this->testCase->postJson(route('api.admin.languages.store'), $attributes);
    }

    public function index(array $attributes = []): TestResponse
    {
        return $this->testCase->getJson(route('api.languages.index', $attributes));
    }

    public function show(array $attributes = []): TestResponse
    {
        return $this->testCase->getJson(route('api.languages.show', $attributes));
    }

    public function update(int $languageId, array $attributes = []): TestResponse
    {
        $attributes['language_id'] = $languageId;

        return $this->testCase->putJson(route('api.admin.languages.update', $attributes));
    }
}
