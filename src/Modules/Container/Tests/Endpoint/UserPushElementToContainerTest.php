<?php

declare(strict_types=1);

namespace Modules\Container\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Container\Tests\ContainerElementApiHelper;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

final class UserPushElementToContainerTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        BaseAuthApiHelper::new($this)->loginAsTestUser();
        $response = ContainerElementApiHelper::new($this)->create(1, [
            'element_type' => 'sentence',
            'element_id' => 1,
        ]);
        $response->assertCreated();
    }
}
