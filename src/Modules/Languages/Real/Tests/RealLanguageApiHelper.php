<?php

declare(strict_types=1);

namespace Modules\Languages\Real\Tests;

use Core\Test\EndpointCase;
use Core\Test\Helpers\ApiHelper;
use Core\Test\Helpers\Helper;
use Illuminate\Testing\TestResponse;

final class RealLanguageApiHelper extends ApiHelper
{
    public function create(array $attributes = []): TestResponse
    {
        $attributes = RealLanguageHelper::new()->generateAttributes() + $attributes;

        return $this->testCase->postJson(route('api.real_languages.create'), $attributes);
    }

    public function index(array $attributes = []): TestResponse
    {
        return $this->testCase->getJson(route('api.real_languages.index', $attributes));
    }

    public function show(array $attributes = []): TestResponse
    {
        return $this->testCase->getJson(route('api.real_languages.show', $attributes));
    }
}
