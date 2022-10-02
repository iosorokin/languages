<?php

namespace Modules\Personal\User\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Personal\User\Tests\UserApiHelper;

class RegistrationUserTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $response = UserApiHelper::new($this)->register();
        $response->assertCreated();
    }
}
