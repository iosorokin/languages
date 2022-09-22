<?php

namespace Modules\Languages\Learning\Tests\Endpoint;

use Core\Test\EndpointCase;
use Modules\Languages\Learning\Tests\LearningLanguageApiHelper;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

class LearnRealLanguageTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        BaseAuthApiHelper::new()->loginAsTestLearner($this);
        $response = LearningLanguageApiHelper::new()->learn($this, 1);
        $response->assertCreated();
    }
}
