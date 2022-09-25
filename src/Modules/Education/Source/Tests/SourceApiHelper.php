<?php

declare(strict_types=1);

namespace Modules\Education\Source\Tests;

use Core\Test\EndpointCase;
use Core\Test\Helpers\ApiHelper;
use Core\Test\Helpers\Helper;
use Illuminate\Testing\TestResponse;

final class SourceApiHelper extends ApiHelper
{

    public function create(string $languageType, int $languageId, array $attributes = []): TestResponse
    {
        $attributes = SourceHelper::new()->generateAttributes() + $attributes;
        $attributes['type'] = $languageType;
        $attributes['id'] = $languageId;

        return $this->testCase->postJson(route('api.sources.create'), $attributes);
    }
}
