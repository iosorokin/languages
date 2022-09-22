<?php

namespace Modules\Languages\Real\Controllers\Api;

use App\Tests\Helpers\Languages\RealLanguageApiHelper;
use Core\Test\EndpointCase;

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
