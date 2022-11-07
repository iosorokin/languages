<?php

declare(strict_types=1);

namespace Domain\Core\Chapters\Controllers;

use App\Base\Tests\EndpointCase;
use App\Helpers\Test\BaseAuthApiHelper;
use Domain\Core\Chapters\Helpers\ChapterApiHelper;

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
