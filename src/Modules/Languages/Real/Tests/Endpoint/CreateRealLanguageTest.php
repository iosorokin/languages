<?php

namespace Modules\Languages\Real\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Languages\Real\Tests\RealLanguageApiHelper;

class CreateRealLanguageTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $response = RealLanguageApiHelper::new($this)->create();
        $response->assertCreated();
    }
}
