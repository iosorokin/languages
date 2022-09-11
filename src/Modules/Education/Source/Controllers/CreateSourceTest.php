<?php

namespace Modules\Education\Source\Controllers;

use Core\Test\Actions\Education\SourceAction;
use Core\Test\EndpointCase;

class CreateSourceTest extends EndpointCase
{
    use SourceAction;

    private const SEEDED_TEST_LANGUAGE = [
        'type' => 'real',
        'id' => 1
    ];

    /**
     * @test
     */
    public function __invoke()
    {
        $response = $this->createSourceByApi(self::SEEDED_TEST_LANGUAGE['type'], self::SEEDED_TEST_LANGUAGE['id']);
        $response->assertOk();
    }
}
