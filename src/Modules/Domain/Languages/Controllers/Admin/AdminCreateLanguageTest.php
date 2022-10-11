<?php

namespace Modules\Domain\Languages\Controllers\Admin;

use Core\Base\Tests\EndpointCase;
use Modules\Domain\Languages\Helpers\LanguageApiHelper;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

class AdminCreateLanguageTest extends EndpointCase
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
