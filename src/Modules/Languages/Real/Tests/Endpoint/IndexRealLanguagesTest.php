<?php

namespace Modules\Languages\Real\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Languages\Real\Tests\RealLanguageApiHelper;

class IndexRealLanguagesTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $response = RealLanguageApiHelper::new($this)->index();
        $response->assertOk();
    }
}
