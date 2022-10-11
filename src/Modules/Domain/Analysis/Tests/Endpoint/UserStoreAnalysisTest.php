<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Domain\Analysis\Tests\AnalysisApiHelper;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

final class UserStoreAnalysisTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        BaseAuthApiHelper::new($this)->loginAsTestUser();

        $response = AnalysisApiHelper::new($this)->create(1);
        $response->assertCreated();
    }
}
