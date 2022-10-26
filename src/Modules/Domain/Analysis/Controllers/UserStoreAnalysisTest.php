<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Controllers;

use App\Helpers\Test\BaseAuthApiHelper;
use Core\Base\Tests\EndpointCase;
use Modules\Domain\Analysis\Helpers\AnalysisApiHelper;

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
