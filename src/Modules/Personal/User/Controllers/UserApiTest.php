<?php

namespace Modules\Personal\User\Controllers;

use Core\Base\Tests\EndpointCase;
use Modules\Personal\User\Helpers\UserApiHelper;

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
