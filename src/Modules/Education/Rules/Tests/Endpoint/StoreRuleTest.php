<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Education\Rules\Tests\RuleApiHelper;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

final class StoreRuleTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        BaseAuthApiHelper::new($this)->loginAsTestUser();
        $response = RuleApiHelper::new($this)->store([
            'language_id' => 1,
        ]);
        $response->assertCreated();
    }
}
