<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Controllers\Admin;

use Core\Base\Tests\EndpointCase;
use Modules\Domain\Languages\Helpers\LanguageApiHelper;
use Modules\Domain\Languages\Helpers\LanguageAppHelper;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

final class AdminUpdateLanguageTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        BaseAuthApiHelper::new($this)->loginAsTestSuperAdmin();
        $response = LanguageApiHelper::new($this)->update(1, LanguageAppHelper::new()->generateAttributes());
        $response->assertOk();
    }
}
