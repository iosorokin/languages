<?php

namespace Modules\Education\Source\Controllers;

use App\Tests\Helpers\Education\SourceApiHelper;
use Core\Test\EndpointCase;

class CreateSourceTest extends EndpointCase
{
    private const SEEDED_TEST_LANGUAGE = [
        'type' => 'real',
        'id' => 1
    ];

    /**
     * @test
     */
    public function __invoke()
    {
        $response = SourceApiHelper::new()->create($this, self::SEEDED_TEST_LANGUAGE['type'], self::SEEDED_TEST_LANGUAGE['id']);
        $response->assertOk();
    }
}
