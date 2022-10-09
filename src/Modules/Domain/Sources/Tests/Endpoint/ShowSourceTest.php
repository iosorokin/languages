<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Domain\Sources\Tests\SourceApiHelper;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

final class ShowSourceTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        BaseAuthApiHelper::new($this)->loginAsTestUser();

        $response = SourceApiHelper::new($this)->show(1);
        $response->assertOk();
    }
}
