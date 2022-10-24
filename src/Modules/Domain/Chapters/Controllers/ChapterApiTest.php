<?php

declare(strict_types=1);

namespace Modules\Domain\Chapters\Controllers;

use Core\Base\Tests\EndpointCase;
use Modules\Domain\Chapters\Helpers\ChapterApiHelper;
use Modules\Personal\Auth\Helpers\BaseAuthApiHelper;

final class ChapterApiTest extends EndpointCase
{
    public function testStore()
    {
        BaseAuthApiHelper::new($this)->loginAsTestUser();
        $response = ChapterApiHelper::new($this)->store(1);
        $response->assertCreated();

        return $response->json('data.id');
    }

    /**
     * @depends testStore
     */
    public function testShow(int $id)
    {
        BaseAuthApiHelper::new($this)->loginAsTestUser();
        $response = ChapterApiHelper::new($this)->show($id);
        $response->assertOk();
    }
}