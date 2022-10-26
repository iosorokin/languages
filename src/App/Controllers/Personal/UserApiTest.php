<?php

namespace App\Controllers\Personal;

use App\Helpers\Test\UserApiHelper;
use Core\Base\Tests\EndpointCase;

class UserApiTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $response = UserApiHelper::new($this)->register();
        $response->assertOk();
    }
}
