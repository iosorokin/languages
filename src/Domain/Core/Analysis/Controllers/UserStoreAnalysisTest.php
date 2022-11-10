<?php

declare(strict_types=1);

namespace Domain\Core\Analysis\Controllers;

use App\Base\Tests\EndpointCase;
use App\Tests\Helpers\BaseAuthApiHelper;
use Domain\Core\Analysis\Helpers\AnalysisApiHelper;

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
