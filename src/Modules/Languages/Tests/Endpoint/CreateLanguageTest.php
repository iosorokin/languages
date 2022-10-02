<?php

namespace Modules\Languages\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Languages\Tests\LanguageApiHelper;

class CreateLanguageTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $response = LanguageApiHelper::new($this)->create();
        $response->assertCreated();
    }
}
