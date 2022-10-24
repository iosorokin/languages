<?php

namespace Modules\Personal\Auth\Controllers;

use Core\Base\Tests\EndpointCase;
use Modules\Personal\Auth\Helpers\BaseAuthApiHelper;

class BaseAuthApiTest extends EndpointCase
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
