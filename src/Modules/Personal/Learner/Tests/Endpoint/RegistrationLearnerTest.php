<?php

namespace Modules\Personal\Learner\Tests\Endpoint;

use Core\Test\EndpointCase;
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
