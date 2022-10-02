<?php

namespace Modules\Languages;

use Illuminate\Support\ServiceProvider;
use Modules\Languages\Entity\Language;
use Modules\Languages\Entity\LanguageModel;
use Modules\Languages\Factories\LanguageFactory;
use Modules\Languages\Factories\ModelLanguageFactory;
use Modules\Languages\Policies\AdminLanguagePolicy;
use Modules\Languages\Policies\LaravelAdminLanguagePolicy;
use Modules\Languages\Presenters\Admin\AdminCreateLanguage;
use Modules\Languages\Presenters\Admin\AdminCreateLanguagePresenter;
use Modules\Languages\Presenters\Admin\AdminDeleteLanguage;
use Modules\Languages\Presenters\Admin\AdminDeleteLanguagePresenter;
use Modules\Languages\Presenters\Admin\AdminGetLanguage;
use Modules\Languages\Presenters\Admin\AdminGetLanguagePresenter;
use Modules\Languages\Presenters\Admin\AdminIndexLanguages;
use Modules\Languages\Presenters\Admin\AdminIndexLanguagesPresenter;
use Modules\Languages\Presenters\Admin\AdminUpdateLanguage;
use Modules\Languages\Presenters\Admin\AdminUpdateLanguagesPresenter;
use Modules\Languages\Presenters\GetLanguage;
use Modules\Languages\Presenters\GetLanguagePresenter;
use Modules\Languages\Repositories\EloquentLanguageRepository;
use Modules\Languages\Repositories\LanguageRepository;

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

        $this->app->bind(AdminLanguagePolicy::class, LaravelAdminLanguagePolicy::class);
        $this->app->bind(LanguageFactory::class, ModelLanguageFactory::class);

        $this->app->bind(GetLanguagePresenter::class, GetLanguage::class);
    }
}
