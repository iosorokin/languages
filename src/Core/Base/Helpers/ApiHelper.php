<?php

declare(strict_types=1);

namespace Core\Base\Helpers;

use Core\Base\Tests\EndpointCase;
use Illuminate\Support\Arr;
use Illuminate\Testing\TestResponse;

abstract class ApiHelper
{
    protected EndpointCase $testCase;

    private function __construct() {}

    public static function new(EndpointCase $testCase): static
    {
        /** @var ApiHelper $instance */
        $instance = new static();
        $instance->setTestCase($testCase);

        return $instance;
    }

    public static function getCreatedIdFromLocation(TestResponse $response): int
    {
        $location = $response->headers->get('location');
        $id = (int) Arr::last(explode('/', $location));

        return $id;
    }

    private function setTestCase(EndpointCase $testCase): void
    {
        $this->testCase = $testCase;
    }

    public function getJson(string $path, array $attributes = []): TestResponse
    {
        return $this->testCase->getJson($path, $attributes);
    }
}
