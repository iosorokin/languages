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
        $response = RuleApiHelper::new($this)->store(1, 'learning');
        $response->assertCreated();
    }
}
