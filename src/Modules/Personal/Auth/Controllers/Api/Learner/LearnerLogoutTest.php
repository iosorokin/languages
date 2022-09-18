<?php

namespace Modules\Personal\Auth\Controllers\Api\Learner;

use App\Tests\Helpers\Personal\BaseAuthApiHelper;
use Core\Test\EndpointCase;

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
