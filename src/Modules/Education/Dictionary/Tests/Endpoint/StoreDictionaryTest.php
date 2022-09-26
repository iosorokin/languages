<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Tests\Endpoint;

use Core\Test\EndpointCase;
use Modules\Education\Dictionary\Tests\DictionaryApiHelper;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

final class StoreDictionaryTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke(): void
    {
        BaseAuthApiHelper::new($this)->loginAsTestLearner($this);
        $response = DictionaryApiHelper::new($this)->store([
            'language_id' => 1,
            'language_type' => 'real',
        ]);
        $response->assertCreated();
    }
}
