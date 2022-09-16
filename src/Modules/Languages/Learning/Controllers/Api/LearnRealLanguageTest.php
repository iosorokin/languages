<?php

namespace Modules\Languages\Learning\Controllers\Api;

use App\Tests\Helpers\languages\LearningLanguageApiHelper;
use App\Tests\Helpers\Personal\BaseAuthApiHelper;
use Core\Test\EndpointCase;

class LearnRealLanguageTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        BaseAuthApiHelper::new()->loginAsTestLearner($this);
        $response = LearningLanguageApiHelper::new()->learn($this, 1);
        $response->assertOk();
    }
}
