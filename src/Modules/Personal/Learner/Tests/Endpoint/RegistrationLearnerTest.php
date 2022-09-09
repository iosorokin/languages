<?php

namespace Modules\Personal\Learner\Tests\Endpoint;


use Core\Test\Actions\Personal\LearnerAction;
use Core\Test\EndpointCase;
use Modules\Personal\Learner\Structures\LearnerModel;

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
