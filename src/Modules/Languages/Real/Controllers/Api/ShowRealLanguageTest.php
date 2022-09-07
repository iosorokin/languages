<?php

namespace Modules\Languages\Real\Controllers\Api;

use Core\Test\Actions\Languages\RealLanguageAction;
use Core\Test\EndpointCase;

class ShowRealLanguageTest extends EndpointCase
{
    use RealLanguageAction;

    /**
     * @test
     */
    public function __invoke()
    {
        $response = $this->showRealLanguage([
            'id' => 1
        ]);
        $response->assertOk();
    }
}
