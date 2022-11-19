<?php

declare(strict_types=1);

namespace App\Presentation\Web\Api\V1\Language;

use App\Base\Test\EndpointCase;
use App\Base\Test\Helpers\BaseAuthApiHelper;
use App\Base\Test\Helpers\LanguageManagerApiHelper;

final class LanguageApiTest extends EndpointCase
{
    public function testAdminCreate()
    {
        BaseAuthApiHelper::new($this)->loginAsTestSuperAdmin();
        $response = LanguageManagerApiHelper::new($this)->adminCreate();
        $response->assertOk();
        $id = $response->json('data.id');

        return $id;
    }

    /**
     * @depends testAdminCreate
     */
    public function testAdminUpdate(int $languageId)
    {
        BaseAuthApiHelper::new($this)->loginAsTestSuperAdmin();
        $response = LanguageManagerApiHelper::new($this)->adminUpdate($languageId, [
            'is_active' => true,
        ]);
        $response->assertNoContent();
    }

    /**
     * @depends testAdminCreate
     */
    public function testGuestShow(int $languageId)
    {
        $response = LanguageManagerApiHelper::new($this)->guestShow($languageId);
        $response->assertOk();
    }

    /**
     * @depends testAdminCreate
     */
    public function testUserShow(int $languageId)
    {
        BaseAuthApiHelper::new($this)->loginAsTestUser();
        $response = LanguageManagerApiHelper::new($this)->userShow($languageId);
        $response->assertOk();
    }

    /**
     * @depends testAdminCreate
     */
    public function testAdminShow(int $languageId)
    {
        BaseAuthApiHelper::new($this)->loginAsTestSuperAdmin();
        $response = LanguageManagerApiHelper::new($this)->adminShow($languageId);
        $response->assertOk();
    }

    public function testGuestIndex()
    {
        $response = LanguageManagerApiHelper::new($this)->guestIndex();
        $response->assertOk();
    }

    public function testUserIndex()
    {
        BaseAuthApiHelper::new($this)->loginAsTestUser();
        $response = LanguageManagerApiHelper::new($this)->userIndex();
        $response->assertOk();
    }

    public function testAdminIndex()
    {
        BaseAuthApiHelper::new($this)->loginAsTestSuperAdmin();
        $response = LanguageManagerApiHelper::new($this)->adminIndex();
        $response->assertOk();
    }

    /**
     * @depends testAdminCreate
     */
    public function testUserAddToFavorite(int $languageId)
    {
        BaseAuthApiHelper::new($this)->loginAsTestUser();
        $response = LanguageManagerApiHelper::new($this)->userAddToFavorite($languageId);
        $response->assertOk();

        return $response->json('data.id');
    }

    /**
     * @depends testAdminCreate
     * @depends testUserAddToFavorite
     */
    public function testUserRemoveFromFavorite(int $languageId, int $favoriteId)
    {
        BaseAuthApiHelper::new($this)->loginAsTestUser();
        $response = LanguageManagerApiHelper::new($this)->userRemoveFromFavorite($languageId, $favoriteId);
        $response->assertNoContent();
    }

    /**
     * @depends testAdminCreate
     */
    public function testAdminDelete(int $languageId)
    {
        BaseAuthApiHelper::new($this)->loginAsTestSuperAdmin();
        $response = LanguageManagerApiHelper::new($this)->adminDelete($languageId);
        $response->assertNoContent();
    }
}
