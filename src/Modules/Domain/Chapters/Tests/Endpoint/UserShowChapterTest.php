<?php

declare(strict_types=1);

namespace Modules\Domain\Chapters\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Domain\Chapters\Tests\ChapterApiHelper;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

final class UserShowChapterTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        BaseAuthApiHelper::new($this)->loginAsTestUser();
        $response = ChapterApiHelper::new($this)->show(69);
        $response->assertOk();
    }
}
