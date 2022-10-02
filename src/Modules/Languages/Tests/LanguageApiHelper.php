<?php

declare(strict_types=1);

namespace Modules\Languages\Tests;

use Core\Base\Helpers\ApiHelper;
use Illuminate\Testing\TestResponse;

final class LanguageApiHelper extends ApiHelper
{
    public function create(array $attributes = []): TestResponse
    {
        $attributes = LanguageHelper::new()->generateAttributes() + $attributes;

        return $this->testCase->postJson(route('api.languages.store'), $attributes);
    }

    public function index(array $attributes = []): TestResponse
    {
        return $this->testCase->getJson(route('api.languages.index', $attributes));
    }

    public function show(array $attributes = []): TestResponse
    {
        return $this->testCase->getJson(route('api.languages.show', $attributes));
    }
}
