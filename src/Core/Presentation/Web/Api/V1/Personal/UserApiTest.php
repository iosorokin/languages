<?php

namespace App\Presentation\Web\Api\V1\Personal;

use Core\Base\Test\EndpointCase;
use Core\Base\Test\Helpers\PersonalApiHelper;

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
