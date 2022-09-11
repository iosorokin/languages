<?php

namespace Modules\Personal\Learner\Controllers\Api;


use Core\Test\Actions\Personal\LearnerAction;
use Core\Test\EndpointCase;

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
