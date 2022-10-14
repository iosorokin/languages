<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites;

use Illuminate\Support\ServiceProvider;
use Modules\Internal\Favorites\Repositories\EloquentFavoriteRepository;
use Modules\Internal\Favorites\Repositories\FavoriteRepository;

final class FavoriteServiceProvider extends ServiceProvider
{
    public function bool()
    {
        $this->app->bind(FavoriteRepository::class, EloquentFavoriteRepository::class);
    }
}
