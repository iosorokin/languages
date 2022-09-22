<?php

namespace Modules\Languages\Real\Tests\Endpoint;

use Core\Test\EndpointCase;
use Modules\Languages\Real\Tests\RealLanguageApiHelper;

class ShowRealLanguageTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $response = RealLanguageApiHelper::new()->show($this, [
            'id' => 1
        ]);
        $response->assertOk();
    }
}
