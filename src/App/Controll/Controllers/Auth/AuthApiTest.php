<?php

namespace App\Controll\Controllers\Auth;

use App\Base\Tests\EndpointCase;
use App\Helpers\Test\BaseAuthApiHelper;

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
