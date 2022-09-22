<?php

namespace Modules\Personal\Auth\Tests\Endpoint;

use Core\Test\EndpointCase;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

class LearnerBaseLoginTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $response = BaseAuthApiHelper::new()->loginAsTestLearner($this);
        $response->assertOk();
    }
}
