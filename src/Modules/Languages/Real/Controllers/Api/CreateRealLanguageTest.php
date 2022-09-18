<?php

namespace Modules\Languages\Real\Controllers\Api;

use App\Tests\Helpers\languages\RealLanguageApiHelper;
use Core\Test\EndpointCase;

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
