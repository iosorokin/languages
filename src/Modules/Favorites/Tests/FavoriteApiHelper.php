<?php

declare(strict_types=1);

namespace Modules\Favorites\Tests;

use Core\Base\Helpers\ApiHelper;
use Illuminate\Testing\TestResponse;

final class FavoriteApiHelper extends ApiHelper
{
    public function add(array $attributes): TestResponse
    {
        return $this->testCase->postJson(route('api.user.favorites.add'), $attributes);
    }

    public function remove(array $attributes): TestResponse
    {
        return $this->testCase->postJson(route('api.user.favorites.remove'), $attributes);
    }
}
