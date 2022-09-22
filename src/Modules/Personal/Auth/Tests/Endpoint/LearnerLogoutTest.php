<?php

namespace Modules\Personal\Auth\Tests\Endpoint;

use Core\Test\EndpointCase;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

class LearnerLogoutTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $helper = BaseAuthApiHelper::new();
        $helper->loginAsTestLearner($this);
        $response = $helper->logoutLearner($this);
        $response->assertNoContent();
        $response = $helper->logoutLearner($this);
        $response->assertUnauthorized();
    }
}
