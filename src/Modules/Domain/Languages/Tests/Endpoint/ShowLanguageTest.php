<?php

namespace Modules\Domain\Languages\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Domain\Languages\Tests\LanguageApiHelper;

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
