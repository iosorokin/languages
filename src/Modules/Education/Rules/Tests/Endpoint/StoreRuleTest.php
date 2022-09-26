<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Tests\Endpoint;

use Core\Test\EndpointCase;
use Modules\Education\Rules\Tests\RuleApiHelper;

final class StoreRuleTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $response = RuleApiHelper::new($this)->store([
            'language_id' => 1,
            'language_type' => 'learning'
        ]);
        $response->assertCreated();
    }
}
