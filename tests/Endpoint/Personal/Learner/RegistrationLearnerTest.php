<?php

namespace Tests\Endpoint\Personal\Learner;

use Tests\Actions\Personal\BaseAuthAction;
use Tests\Actions\Personal\LearnerAction;
use Tests\Endpoint\EndpointCase;

class RegistrationLearnerTest extends EndpointCase
{
    use LearnerAction;

    /**
     * @test
     */
    public function __invoke()
    {
        $response = $this->createStudentByApi();
        $response->assertOk();
    }
}
