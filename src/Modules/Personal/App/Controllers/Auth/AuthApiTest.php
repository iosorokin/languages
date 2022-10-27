<?php

namespace Modules\Personal\App\Controllers\Auth;

use App\Helpers\Test\BaseAuthApiHelper;
use Core\Base\Tests\EndpointCase;

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
