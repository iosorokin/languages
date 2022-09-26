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
        $helper = BaseAuthApiHelper::new($this);
        $helper->loginAsTestLearner();
        $response = $helper->logoutLearner();
        $response->assertNoContent();
        $response = $helper->logoutLearner();
        $response->assertUnauthorized();
    }
}
