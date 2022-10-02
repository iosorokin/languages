<?php

namespace Modules\Languages\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Languages\Tests\LanguageApiHelper;

class IndexLanguagesTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $response = LanguageApiHelper::new($this)->index();
        $response->assertOk();
    }
}
