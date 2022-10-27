<?php

namespace Modules\Core\Sources\Controllers;

use App\Helpers\Test\BaseAuthApiHelper;
use Core\Base\Tests\EndpointCase;
use Modules\Core\Languages\Application\Helpers\LanguageSeedHelper;
use Modules\Core\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;
use Modules\Core\Sources\Helpers\SourceApiHelper;

class SourceApiTest extends EndpointCase
{
    public function testUserCreate()
    {
        $helper = LanguageSeedHelper::new();
        /** @var LanguageModel $language */
        $language = $helper->create(1)
            ->current();
        $helper->activate(1, $language);

        BaseAuthApiHelper::new($this)->loginAsTestUser();
        $response = SourceApiHelper::new($this)->userStore([
            'language_id' => $language->getId(),
        ]);
        $response->assertOk();

        return $response->json('data.id');
    }

    /**
     * @depends testUserCreate
     */
    public function testUserShow(int $id)
    {
        BaseAuthApiHelper::new($this)->loginAsTestUser();

        $response = SourceApiHelper::new($this)->userShow($id);
        $response->assertOk();
    }

    /**
     * @depends testUserCreate
     */
    public function testGuestShow(int $id)
    {
        $response = SourceApiHelper::new($this)->guestShow($id);
        $response->assertOk();
    }

    public function testUserIndex()
    {
        BaseAuthApiHelper::new($this)->loginAsTestUser();

        $response = SourceApiHelper::new($this)->userIndex();
        $response->assertOk();
    }

    public function testGuestIndex()
    {
        $response = SourceApiHelper::new($this)->guestIndex();
        $response->assertOk();
    }

    /**
     * @depends testUserCreate
     */
    public function testUserUpdate(int $id)
    {
        BaseAuthApiHelper::new($this)->loginAsTestUser();

        $response = SourceApiHelper::new($this)->userUpdate($id, [
            'title' => 'New title',
            'description' => 'New description',
        ]);
        $response->assertOk();
    }

    /**
     * @depends testUserCreate
     */
    public function testUserDelete(int $id)
    {
        BaseAuthApiHelper::new($this)->loginAsTestUser();

        $response = SourceApiHelper::new($this)->userDelete($id);
        $response->assertOk();
    }
}
