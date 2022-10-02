<?php

namespace Modules\Personal\Auth\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

class LogoutTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $helper = BaseAuthApiHelper::new($this);
        $response = $helper->logout();
        $response->assertUnauthorized();
        $helper->loginAsTestUser();
        $response = $helper->logout();
        $response->assertNoContent();
    }
}
