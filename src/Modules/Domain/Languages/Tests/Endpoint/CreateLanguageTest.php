<?php

namespace Modules\Domain\Languages\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Domain\Languages\Tests\LanguageApiHelper;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

class CreateLanguageTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        BaseAuthApiHelper::new($this)->loginAsTestSuperAdmin();
        $response = LanguageApiHelper::new($this)->create();
        $response->assertCreated();
    }
}
