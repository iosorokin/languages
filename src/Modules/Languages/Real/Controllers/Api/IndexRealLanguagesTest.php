<?php

namespace Modules\Languages\Real\Controllers\Api;


use Core\Test\Actions\Languages\RealLanguageAction;
use Core\Test\EndpointCase;

class IndexRealLanguagesTest extends EndpointCase
{
    use RealLanguageAction;

    /**
     * @test
     */
    public function __invoke()
    {
        $response = $this->indexRealLanguages();
        $response->assertOk();
    }
}
