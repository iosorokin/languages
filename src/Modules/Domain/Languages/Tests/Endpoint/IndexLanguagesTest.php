<?php

namespace Modules\Core\Languages\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Core\Languages\Tests\LanguageApiHelper;

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
