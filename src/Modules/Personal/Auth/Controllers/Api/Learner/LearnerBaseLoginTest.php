<?php

namespace Modules\Personal\Auth\Controllers\Api\Learner;

use App\Tests\Helpers\Personal\BaseAuthApiHelper;
use Core\Test\EndpointCase;

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
