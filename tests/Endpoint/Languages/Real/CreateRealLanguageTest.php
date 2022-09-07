<?php

namespace Tests\Endpoint\Languages\Real;

use Tests\Actions\Languages\RealLanguageAction;
use Tests\Endpoint\EndpointCase;

class CreateRealLanguageTest extends EndpointCase
{
    use RealLanguageAction;

    /**
     * @test
     */
    public function __invoke()
    {
        $response = $this->createRealLanguage();
        $response->assertOk();
    }
}
