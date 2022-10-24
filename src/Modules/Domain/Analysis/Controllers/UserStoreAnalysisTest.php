<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Controllers;

use Core\Base\Tests\EndpointCase;
use Modules\Domain\Analysis\Helpers\AnalysisApiHelper;
use Modules\Personal\Auth\Helpers\BaseAuthApiHelper;

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
