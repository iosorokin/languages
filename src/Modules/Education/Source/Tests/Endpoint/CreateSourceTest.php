<?php

namespace Modules\Education\Source\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Education\Source\Tests\SourceApiHelper;

class CreateSourceTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        $response = SourceApiHelper::new($this)->create([
            'language_id' => 1,
            'language_type' => 'learning',
        ]);
        $response->assertCreated();
    }
}
