<?php

namespace Modules\Domain\Languages\Controllers\Guest;

use Core\Base\Tests\EndpointCase;
use Modules\Domain\Languages\Helpers\LanguageApiHelper;

class GuestIndexLanguagesTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $response = LanguageApiHelper::new($this)->index();
        $response->assertOk();
    }
}
