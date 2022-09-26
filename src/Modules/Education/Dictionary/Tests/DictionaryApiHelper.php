<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Tests;

use Core\Test\EndpointCase;
use Core\Test\Helpers\ApiHelper;
use Core\Test\Helpers\Helper;
use Illuminate\Testing\TestResponse;

final class DictionaryApiHelper extends ApiHelper
{
    public function store(array $attributes): TestResponse
    {
        $attributes = DictionaryHelper::new()->generateAttributes() + $attributes;

        return $this->testCase->post(route('api.dictionaries.store'), $attributes);
    }
}
