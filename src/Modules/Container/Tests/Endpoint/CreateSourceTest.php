<?php

namespace Modules\Container\Tests\Endpoint;

use Core\Test\EndpointCase;
use Modules\Container\Tests\SourceApiHelper;

class CreateSourceTest extends EndpointCase
{
    private const SEEDED_TEST_LANGUAGE = [
        'type' => 'learning',
        'id' => 1
    ];

    /**
     * @test
     */
    public function __invoke()
    {
        $response = SourceApiHelper::new()->create(
            $this, self::SEEDED_TEST_LANGUAGE['type'],
            self::SEEDED_TEST_LANGUAGE['id']
        );
        $response->assertCreated();
    }
}
