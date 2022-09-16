<?php

namespace Modules\Personal\Learner\Controllers\Api;

use App\Tests\Helpers\Personal\LearnerApiHelper;
use Core\Test\EndpointCase;

class RegistrationLearnerTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $response = LearnerApiHelper::new()->create($this);
        $response->assertCreated();
    }
}
