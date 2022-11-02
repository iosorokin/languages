<?php

declare(strict_types=1);

namespace Domain\Analysis\Controllers;

use App\Base\Tests\EndpointCase;
use App\Helpers\Test\BaseAuthApiHelper;
use Domain\Analysis\Helpers\AnalysisApiHelper;

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
