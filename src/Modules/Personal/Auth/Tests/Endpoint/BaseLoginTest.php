<?php

namespace Modules\Personal\Auth\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

class BaseLoginTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $response = BaseAuthApiHelper::new($this)->loginAsTestUser();
        $response->assertOk();
    }
}
