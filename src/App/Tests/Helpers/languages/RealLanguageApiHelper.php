<?php

declare(strict_types=1);

namespace App\Tests\Helpers\languages;

use Core\Test\EndpointCase;
use Core\Test\Helper;
use Illuminate\Testing\TestResponse;

final class RealLanguageApiHelper extends Helper
{
    public function __construct(
        private RealLanguageHelper $languageHelper,
    ) {}

    public function create(EndpointCase $testCase, array $attributes = []): TestResponse
    {
        $attributes = $this->languageHelper->generateAttributes() + $attributes;

        return $testCase->postJson(route('api.real_languages.create'), $attributes);
    }

    public function index(EndpointCase $testCase, array $attributes = []): TestResponse
    {
        return $testCase->getJson(route('api.real_languages.index', $attributes));
    }

    public function show(EndpointCase $testCase, array $attributes = []): TestResponse
    {
        return $testCase->getJson(route('api.real_languages.show', $attributes));
    }
}
