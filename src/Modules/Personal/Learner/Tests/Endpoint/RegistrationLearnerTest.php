<?php

namespace Modules\Personal\Learner\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Personal\Learner\Tests\LearnerApiHelper;

class RegistrationLearnerTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $response = LearnerApiHelper::new($this)->create();
        $response->assertCreated();
    }
}
