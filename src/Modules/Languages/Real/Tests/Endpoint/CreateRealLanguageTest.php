<?php

namespace Modules\Languages\Real\Tests\Endpoint;

use Core\Test\EndpointCase;
use Modules\Languages\Real\Tests\RealLanguageApiHelper;

class CreateRealLanguageTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $response = RealLanguageApiHelper::new()->create($this);
        $response->assertCreated();
    }
}
