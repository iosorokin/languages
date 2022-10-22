<?php

namespace Modules\Domain\Languages;

use Illuminate\Support\ServiceProvider;
use Modules\Domain\Languages\Actions\CreateLanguage;
use Modules\Domain\Languages\Actions\DeleteLanguage;
use Modules\Domain\Languages\Actions\ShowLanguage;
use Modules\Domain\Languages\Actions\UpdateLanguage;
use Modules\Domain\Languages\Factories\EloquentLanguageStructureFactory;
use Modules\Domain\Languages\Factories\EntityLanguageFactory;
use Modules\Domain\Languages\Factories\LanguageFactory;
use Modules\Domain\Languages\Authorization\AuthorizeLanguage;
use Modules\Domain\Languages\Authorization\AuthorizeLanguageImpl;
use Modules\Domain\Languages\Policies\LanguagePolicy;
use Modules\Domain\Languages\Policies\LanguagePolicyImpl;
use Modules\Domain\Languages\Presenters\Admin\AdminCreateLanguage;
use Modules\Domain\Languages\Presenters\Admin\AdminCreateLanguagePresenter;
use Modules\Domain\Languages\Presenters\Admin\AdminDeleteLanguage;
use Modules\Domain\Languages\Presenters\Admin\AdminDeleteLanguagePresenter;
use Modules\Domain\Languages\Presenters\Admin\AdminIndexLanguages;
use Modules\Domain\Languages\Presenters\Admin\AdminIndexLanguagesPresenter;
use Modules\Domain\Languages\Presenters\Admin\AdminShowLanguage;
use Modules\Domain\Languages\Presenters\Admin\AdminShowLanguagePresenter;
use Modules\Domain\Languages\Presenters\Admin\AdminUpdateLanguage;
use Modules\Domain\Languages\Presenters\Admin\AdminUpdateLanguagePresenter;
use Modules\Domain\Languages\Presenters\Guest\GuestIndexLanguages;
use Modules\Domain\Languages\Presenters\Guest\GuestIndexLanguagesPresenter;
use Modules\Domain\Languages\Presenters\Guest\GuestShowLanguage;
use Modules\Domain\Languages\Presenters\Guest\GuestShowLanguagePresenter;
use Modules\Domain\Languages\Presenters\Internal\GetLanguage;
use Modules\Domain\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Domain\Languages\Presenters\User\UserAddLanguageToFavorite;
use Modules\Domain\Languages\Presenters\User\UserAddLanguageToFavoritePresenter;
use Modules\Domain\Languages\Presenters\User\UserIndexLanguages;
use Modules\Domain\Languages\Presenters\User\UserIndexLanguagesPresenter;
use Modules\Domain\Languages\Presenters\User\UserRemoveFromFavorite;
use Modules\Domain\Languages\Presenters\User\UserRemoveLanguageFromFavoritePresenter;
use Modules\Domain\Languages\Presenters\User\UserShowLanguage;
use Modules\Domain\Languages\Presenters\User\UserShowLanguagePresenter;
use Modules\Domain\Languages\Repositories\Eloquent\EloquentLanguageRepository;
use Modules\Domain\Languages\Repositories\Entities\EntityLanguageRepository;
use Modules\Domain\Languages\Repositories\LanguageRepository;
use Modules\Domain\Sources\Presenters\User\UserCreateSourcePresenter;

class LanguageServiceProvider extends ServiceProvider
{
    private array $write = [
        CreateLanguage::class,
        UpdateLanguage::class,
        DeleteLanguage::class,
        UserAddLanguageToFavoritePresenter::class,
        UserRemoveLanguageFromFavoritePresenter::class,
        UserCreateSourcePresenter::class,
    ];

    private array $read = [
        ShowLanguage::class,
        GuestIndexLanguagesPresenter::class,
        UserIndexLanguagesPresenter::class,
        AdminIndexLanguagesPresenter::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bindVariable();

        $this->app->bind(AdminCreateLanguagePresenter::class, AdminCreateLanguage::class);
        $this->app->bind(AdminDeleteLanguagePresenter::class, AdminDeleteLanguage::class);
        $this->app->bind(AdminShowLanguagePresenter::class, AdminShowLanguage::class);
        $this->app->bind(AdminIndexLanguagesPresenter::class, AdminIndexLanguages::class);
        $this->app->bind(AdminUpdateLanguagePresenter::class, AdminUpdateLanguage::class);

        $this->app->bind(UserShowLanguagePresenter::class, UserShowLanguage::class);
        $this->app->bind(UserIndexLanguagesPresenter::class, UserIndexLanguages::class);

        $this->app->bind(GuestShowLanguagePresenter::class, GuestShowLanguage::class);
        $this->app->bind(GuestIndexLanguagesPresenter::class, GuestIndexLanguages::class);

        $this->app->bind(UserAddLanguageToFavoritePresenter::class, UserAddLanguageToFavorite::class);
        $this->app->bind(UserRemoveLanguageFromFavoritePresenter::class, UserRemoveFromFavorite::class);

        $this->app->bind(AuthorizeLanguage::class, AuthorizeLanguageImpl::class);
        $this->app->bind(LanguagePolicy::class, LanguagePolicyImpl::class);

        $this->app->bind(GetLanguagePresenter::class, GetLanguage::class);

    }

    private function bindVariable(): void
    {
        foreach ($this->write as $class) {
            $this->app->beforeResolving($class, function () {
                $this->app->bind(LanguageFactory::class, EloquentLanguageStructureFactory::class);
            });
        }

        foreach ($this->read as $class) {
            $this->app->beforeResolving($class, function () {
                $this->app->bind(LanguageFactory::class, EntityLanguageFactory::class);
            });
        }
    }
}
