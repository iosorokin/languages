<?php

namespace Domain\Presentation\Web\Api\V1\Auth;

use Core\Base\Test\EndpointCase;
use Core\Base\Test\Helpers\BaseAuthApiHelper;

class AuthApiTest extends EndpointCase
{
    public function testLogin()
    {
        $response = BaseAuthApiHelper::new($this)->loginAsTestSuperAdmin();
        $response->assertOk();
    }

    public function testLogout()
    {
        $helper = BaseAuthApiHelper::new($this);
        $response = $helper->logout();
        $response->assertUnauthorized();
        $helper->loginAsTestSuperAdmin();
        $response = $helper->logout();
        $response->assertNoContent();
    }
}
