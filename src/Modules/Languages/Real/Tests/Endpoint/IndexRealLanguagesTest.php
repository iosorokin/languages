<?php

namespace Modules\Languages\Real\Tests\Endpoint;

use Core\Test\EndpointCase;
use Modules\Languages\Real\Tests\RealLanguageApiHelper;

class IndexRealLanguagesTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $response = RealLanguageApiHelper::new()->index($this);
        $response->assertOk();
    }
}
