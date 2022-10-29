<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Application\Controllers;

use App\Helpers\Test\BaseAuthApiHelper;
use Core\Base\Tests\EndpointCase;
use Modules\Domain\Languages\Application\Helpers\LanguageApiHelper;

final class LanguageApiTest extends EndpointCase
{
    public function testAdminCreate()
    {
        BaseAuthApiHelper::new($this)->loginAsTestSuperAdmin();
        $response = LanguageApiHelper::new($this)->adminCreate();
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
        $response = LanguageApiHelper::new($this)->adminUpdate($languageId, [
            'is_active' => true,
        ]);
        $response->assertNoContent();
    }

    /**
     * @depends testAdminCreate
     */
    public function testGuestShow(int $languageId)
    {
        $response = LanguageApiHelper::new($this)->guestShow($languageId);
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
    public function testAdminShow(int $languageId)
    {
        BaseAuthApiHelper::new($this)->loginAsTestSuperAdmin();
        $response = LanguageApiHelper::new($this)->adminShow($languageId);
        $response->assertOk();
    }

    public function testGuestIndex()
    {
        $response = LanguageApiHelper::new($this)->guestIndex();
        $response->assertOk();
    }

    public function testUserIndex()
    {
        BaseAuthApiHelper::new($this)->loginAsTestUser();
        $response = LanguageApiHelper::new($this)->userIndex();
        $response->assertOk();
    }

    public function testAdminIndex()
    {
        BaseAuthApiHelper::new($this)->loginAsTestSuperAdmin();
        $response = LanguageApiHelper::new($this)->adminIndex();
        $response->assertOk();
    }

    /**
     * @depends testAdminCreate
     */
    public function testUserAddToFavorite(int $languageId)
    {
        BaseAuthApiHelper::new($this)->loginAsTestUser();
        $response = LanguageApiHelper::new($this)->userAddToFavorite($languageId);
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
        $response = LanguageApiHelper::new($this)->userRemoveFromFavorite($languageId, $favoriteId);
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