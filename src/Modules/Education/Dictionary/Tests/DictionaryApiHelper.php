<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Tests;

use Core\Base\Helpers\ApiHelper;
use Illuminate\Testing\TestResponse;

final class DictionaryApiHelper extends ApiHelper
{
    public function store(array $attributes): TestResponse
    {
        $attributes = DictionaryHelper::new()->generateAttributes() + $attributes;

        return $this->testCase->post(route('api.user.dictionaries.store'), $attributes);
    }
}
