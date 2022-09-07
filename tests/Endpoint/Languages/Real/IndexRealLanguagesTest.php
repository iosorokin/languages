<?php

namespace Tests\Endpoint\Languages\Real;

use Tests\Actions\Languages\RealLanguageAction;
use Tests\Endpoint\EndpointCase;

class IndexRealLanguagesTest extends EndpointCase
{
    use RealLanguageAction;

    /**
     * @test
     */
    public function __invoke()
    {
        $response = $this->indexRealLanguages([
            'limit' => 10,
        ]);
        $response->assertOk();
    }
}
