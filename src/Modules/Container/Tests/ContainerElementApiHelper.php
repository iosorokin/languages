<?php

declare(strict_types=1);

namespace Modules\Container\Tests;

use Core\Base\Helpers\ApiHelper;
use Illuminate\Testing\TestResponse;

final class ContainerElementApiHelper extends ApiHelper
{
    public function create(int $containerId, array $attributes = []): TestResponse
    {
        return $this->testCase->postJson(
            route('api.user.containers.elements.store', ['id' => $containerId]),
            $attributes
        );
    }
}
