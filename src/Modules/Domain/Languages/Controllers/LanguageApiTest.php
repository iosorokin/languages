<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Controllers;

use Core\Base\Helpers\ApiHelper;
use Core\Base\Tests\EndpointCase;
use Modules\Domain\Languages\Helpers\LanguageApiHelper;
use Modules\Domain\Languages\Helpers\LanguageAppHelper;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

final class LanguageApiTest extends EndpointCase
{
    public function testAdminCreate()
    {
        BaseAuthApiHelper::new($this)->loginAsTestSuperAdmin();
        $response = LanguageApiHelper::new($this)->adminCreate();
        $response->assertCreated();
        $id = ApiHelper::getCreatedIdFromLocation($response);

        return $id;
    }

    /**
     * @depends testAdminCreate
     */
    public function testAdminShow(int $languageId)
    {
        BaseAuthApiHelper::new($this)->loginAsTestUser();
        $response = LanguageApiHelper::new($this)->adminShow($languageId);
        $response->assertOk();
    }

    /**
     * @depends testAdminCreate
     */
    public function testUserShow(int $languageId)
    {
        BaseAuthApiHelper::new($this)->loginAsTestUser();
        $response = LanguageApiHelper::new($this)->userShow($languageId);
        $response->assertOk();
    }

    /**
     * @depends testAdminCreate
     */
    public function testGuestShow(int $languageId)
    {
        $response = LanguageApiHelper::new($this)->guestShow($languageId);
        $response->assertOk();
    }

    public function testGuestIndex()
    {
        $response = LanguageApiHelper::new($this)->guestIndex();
        $response->assertOk();
    }

    /**
     * @depends testAdminCreate
     */
    public function testAdminUpdate(int $languageId)
    {
        BaseAuthApiHelper::new($this)->loginAsTestSuperAdmin();
        $response = LanguageApiHelper::new($this)->adminUpdate($languageId, LanguageAppHelper::new()->generateAttributes());
        $response->assertNoContent();
    }

    /**
     * @depends testAdminCreate
     */
    public function testAdminDelete(int $languageId)
    {
        BaseAuthApiHelper::new($this)->loginAsTestSuperAdmin();
        $response = LanguageApiHelper::new($this)->adminDelete($languageId);
        $response->assertNoContent();
    }
}
