<?php

namespace App\Presentation\Web\Api\V1\Personal;

use App\Base\Test\EndpointCase;
use App\Base\Test\Helpers\PersonalApiHelper;

class UserApiTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $response = PersonalApiHelper::new($this)->register();
        $response->assertOk();
    }
}
