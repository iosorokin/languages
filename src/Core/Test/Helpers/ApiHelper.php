<?php

declare(strict_types=1);

namespace Core\Test\Helpers;

use Core\Test\EndpointCase;

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

    private function setTestCase(EndpointCase $testCase): void
    {
        $this->testCase = $testCase;
    }
}
