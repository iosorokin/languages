<?php

declare(strict_types=1);

namespace App\Tests\Helpers\Personal;

use Core\Test\EndpointCase;
use Core\Test\Helper;
use Illuminate\Testing\TestResponse;

final class LearnerApiHelper extends Helper
{
    public function __construct(
        private readonly LearnerHelper $learnerHelper
    ) {}

    public function create(EndpointCase $testCase, array $attributes = []): TestResponse
    {
        $attributes = $this->learnerHelper->generateAttributes() + $attributes;

        return $testCase->postJson(route('api.learners.store'), $attributes);
    }
}
