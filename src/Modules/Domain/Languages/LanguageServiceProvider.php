<?php

namespace Modules\Domain\Languages;

use Illuminate\Support\ServiceProvider;
use Modules\Domain\Languages\Entities\Language;
use Modules\Domain\Languages\Entities\LanguageModel;
use Modules\Domain\Languages\Factories\LanguageFactory;
use Modules\Domain\Languages\Factories\ModelLanguageFactory;
use Modules\Domain\Languages\Policies\LanguagePolicy;
use Modules\Domain\Languages\Policies\LaravelLanguagePolicy;
use Modules\Domain\Languages\Presenters\Admin\AdminCreateLanguage;
use Modules\Domain\Languages\Presenters\Admin\AdminCreateLanguagePresenter;
use Modules\Domain\Languages\Presenters\Admin\AdminDeleteLanguage;
use Modules\Domain\Languages\Presenters\Admin\AdminDeleteLanguagePresenter;
use Modules\Domain\Languages\Presenters\Admin\AdminGetLanguage;
use Modules\Domain\Languages\Presenters\Admin\AdminGetLanguagePresenter;
use Modules\Domain\Languages\Presenters\Admin\AdminIndexLanguages;
use Modules\Domain\Languages\Presenters\Admin\AdminIndexLanguagesPresenter;
use Modules\Domain\Languages\Presenters\Admin\AdminUpdateLanguage;
use Modules\Domain\Languages\Presenters\Admin\AdminUpdateLanguagesPresenter;
use Modules\Domain\Languages\Presenters\Guest\GuestShowLanguage;
use Modules\Domain\Languages\Presenters\Guest\GuestShowLanguagePresenter;
use Modules\Domain\Languages\Presenters\Internal\GetLanguage;
use Modules\Domain\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Domain\Languages\Repositories\EloquentLanguageRepository;
use Modules\Domain\Languages\Repositories\LanguageRepository;

class LanguageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(LanguageRepository::class, EloquentLanguageRepository::class);

        $this->app->bind(Language::class, LanguageModel::class);

        $this->app->bind(AdminCreateLanguagePresenter::class, AdminCreateLanguage::class);
        $this->app->bind(AdminDeleteLanguagePresenter::class, AdminDeleteLanguage::class);
        $this->app->bind(AdminGetLanguagePresenter::class, AdminGetLanguage::class);
        $this->app->bind(AdminIndexLanguagesPresenter::class, AdminIndexLanguages::class);
        $this->app->bind(AdminUpdateLanguagesPresenter::class, AdminUpdateLanguage::class);

        $this->app->bind(GuestShowLanguagePresenter::class, GuestShowLanguage::class);

        $this->app->bind(LanguagePolicy::class, LaravelLanguagePolicy::class);
        $this->app->bind(LanguageFactory::class, ModelLanguageFactory::class);

        $this->app->bind(GetLanguagePresenter::class, GetLanguage::class);
    }
}
