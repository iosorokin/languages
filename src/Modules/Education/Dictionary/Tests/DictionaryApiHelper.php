<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Tests;

use Core\Test\EndpointCase;
use Core\Test\Helper;
use Illuminate\Testing\TestResponse;

final class DictionaryApiHelper extends Helper
{
    public function __construct(
        private DictionaryHelper $dictionaryHelper,
    ) {}

    public function store(EndpointCase $testCase, array $attributes): TestResponse
    {
        $attributes = $this->dictionaryHelper->generateAttributes() + $attributes;

        return $testCase->post(route('api.dictionaries.store'), $attributes);
    }
}
