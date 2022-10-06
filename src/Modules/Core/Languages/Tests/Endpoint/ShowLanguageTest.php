<?php

namespace Modules\Core\Languages\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Core\Languages\Tests\LanguageApiHelper;

class ShowLanguageTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $response = LanguageApiHelper::new($this)->show([
            'id' => 1
        ]);
        $response->assertOk();
    }
}
