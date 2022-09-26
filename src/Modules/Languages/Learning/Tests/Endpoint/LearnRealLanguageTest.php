<?php

namespace Modules\Languages\Learning\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Languages\Learning\Tests\LearningLanguageApiHelper;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

class LearnRealLanguageTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        BaseAuthApiHelper::new($this)->loginAsTestLearner();
        $response = LearningLanguageApiHelper::new($this)->learn(1);
        $response->assertCreated();
    }
}
