<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Education\Dictionary\Tests\DictionaryApiHelper;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

final class StoreDictionaryTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke(): void
    {
        BaseAuthApiHelper::new($this)->loginAsTestSuperAdmin($this);
        $response = DictionaryApiHelper::new($this)->store([
            'language_id' => 1,
            'language_type' => 'real',
        ]);
        $response->assertCreated();
    }
}
