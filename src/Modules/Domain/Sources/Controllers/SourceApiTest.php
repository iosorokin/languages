<?php

namespace Modules\Domain\Sources\Controllers;

use Core\Base\Helpers\ApiHelper;
use Core\Base\Tests\EndpointCase;
use Modules\Domain\Languages\Helpers\LanguageSeedHelper;
use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Sources\Helpers\SourceApiHelper;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

class SourceApiTest extends EndpointCase
{
    public function testUserCreate()
    {
        $helper = LanguageSeedHelper::new();
        /** @var Language $language */
        $language = $helper->create(1)
            ->current();
        $helper->activate(1, $language);

        BaseAuthApiHelper::new($this)->loginAsTestUser();
        $response = SourceApiHelper::new($this)->store([
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

        $response = SourceApiHelper::new($this)->show($id);
        $response->assertOk();
    }

    public function testGuestShow(int $id)
    {

    }

    public function testUserIndex()
    {

    }

    public function testGuestIndex()
    {

    }

    public function testUserUpdate()
    {

    }

    public function testUserDelete()
    {

    }
}
