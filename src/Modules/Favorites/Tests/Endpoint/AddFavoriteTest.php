<?php

declare(strict_types=1);

namespace Modules\Favorites\Tests\Endpoint;

use Core\Base\Tests\EndpointCase;
use Modules\Favorites\Tests\FavoriteApiHelper;
use Modules\Personal\Auth\Tests\BaseAuthApiHelper;

final class AddFavoriteTest extends EndpointCase
{
    /**
     * @test
     */
    public function __invoke()
    {
        (BaseAuthApiHelper::new($this))->loginAsTestUser();
        $response = (FavoriteApiHelper::new($this))->add([
            'type' => 'language',
            'id' => 1,
        ]);
        $response->assertCreated();
    }
}
