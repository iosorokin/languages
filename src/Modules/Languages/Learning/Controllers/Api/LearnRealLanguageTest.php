<?php

namespace Modules\Languages\Learning\Controllers\Api;

use Core\Test\Actions\Languages\LearningLanguageAction;
use Core\Test\Actions\Languages\RealLanguageAction;
use Core\Test\Actions\Personal\LearnerAction;
use Core\Test\EndpointCase;

class LearnRealLanguageTest extends EndpointCase
{
    use LearnerAction;
    use RealLanguageAction;
    use LearningLanguageAction;

    /**
     * @test
     */
    public function __invoke()
    {


        $response = $this->learnRealLanguage(1);
        $response->assertOk();
    }
}
