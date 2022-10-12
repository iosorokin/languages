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
        $helper = LanguageApiHelper::new($this);
        $response = $helper->index();
        $response->assertOk();
        $cursor = $response->json('nextCursorUrl');
        $this->assertNotEmpty($cursor);
        $response = $helper->getJson($cursor);
        $response->assertOk();
        $cursor = $response->json('prevCursorUrl');
        $this->assertNotEmpty($cursor);
        $response = $helper->getJson($cursor);
        $response->assertOk();
    }
}
