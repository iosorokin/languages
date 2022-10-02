<?php

namespace Modules\Education\Source\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Education\Source\Tests\SourceApiHelper;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

class CreateSourceTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        BaseAuthApiHelper::new($this)->loginAsTestUser();
        $response = SourceApiHelper::new($this)->create([
            'language_id' => 1,
            'language_type' => 'learning',
        ]);
        $response->assertCreated();
    }
}
