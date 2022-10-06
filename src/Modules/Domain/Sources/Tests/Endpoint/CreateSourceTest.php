<?php

namespace Modules\Domain\Sources\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Domain\Sources\Tests\SourceApiHelper;
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
