<?php

namespace Modules\Domain\Languages\Controllers\Guest;

use Core\Base\Tests\EndpointCase;
use Modules\Domain\Languages\Helpers\LanguageApiHelper;

class GuestShowLanguageTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $response = LanguageApiHelper::new($this)->show([
            'language_id' => 1
        ]);
        $response->assertOk();
    }
}
