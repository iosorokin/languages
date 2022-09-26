<?php

namespace Modules\Languages\Real\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Languages\Real\Tests\RealLanguageApiHelper;

class ShowRealLanguageTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $response = RealLanguageApiHelper::new($this)->show([
            'id' => 1
        ]);
        $response->assertOk();
    }
}
