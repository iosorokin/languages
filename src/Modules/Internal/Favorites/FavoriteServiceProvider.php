<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites;

use Illuminate\Support\ServiceProvider;
use Modules\Internal\Favorites\Factories\FavoriteFactory;
use Modules\Internal\Favorites\Factories\ModelFavoriteFactory;
use Modules\Internal\Favorites\Policies\FavoritePolicy;
use Modules\Internal\Favorites\Policies\LaravelFavoritePolicy;
use Modules\Internal\Favorites\Presenters\AddToFavorite;
use Modules\Internal\Favorites\Presenters\AddToFavoritePresenter;
use Modules\Internal\Favorites\Presenters\RemoveFavorite;
use Modules\Internal\Favorites\Presenters\RemoveFavoritePresenter;
use Modules\Internal\Favorites\Repositories\EloquentFavoriteRepository;
use Modules\Internal\Favorites\Repositories\FavoriteRepository;

final class FavoriteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(FavoriteRepository::class, EloquentFavoriteRepository::class);
        $this->app->bind(FavoriteFactory::class, ModelFavoriteFactory::class);
        $this->app->bind(AddToFavoritePresenter::class, AddToFavorite::class);
        $this->app->bind(RemoveFavoritePresenter::class, RemoveFavorite::class);
        $this->app->bind(FavoritePolicy::class, LaravelFavoritePolicy::class);
    }
}
