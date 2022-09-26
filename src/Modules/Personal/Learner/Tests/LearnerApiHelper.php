<?php

declare(strict_types=1);

namespace Modules\Personal\Learner\Tests;

use Core\Base\Helpers\ApiHelper;
use Illuminate\Testing\TestResponse;

final class LearnerApiHelper extends ApiHelper
{
    public function create(array $attributes = []): TestResponse
    {
        $attributes = LearnerHelper::new()->generateAttributes() + $attributes;

        return $this->testCase->postJson(route('api.learners.store'), $attributes);
    }
}
