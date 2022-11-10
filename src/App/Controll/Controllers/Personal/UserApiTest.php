<?php

namespace App\Controll\Controllers\Personal;

use App\Base\Tests\EndpointCase;
use App\Tests\Helpers\PersonalApiHelper;

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
