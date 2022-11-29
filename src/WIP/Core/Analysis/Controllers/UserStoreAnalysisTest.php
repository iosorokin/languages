<?php

declare(strict_types=1);

namespace WIP\Core\Analysis\Controllers;

use Core\Base\Test\EndpointCase;
use Core\Base\Test\Helpers\BaseAuthApiHelper;
use WIP\Core\Analysis\Helpers\AnalysisApiHelper;

final class UserStoreAnalysisTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        BaseAuthApiHelper::new($this)->loginAsTestUser();

        $response = AnalysisApiHelper::new($this)->create(1);
        $response->assertOk();
    }
}
