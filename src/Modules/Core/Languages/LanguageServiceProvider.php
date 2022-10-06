<?php

namespace Modules\Core\Languages;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Languages\Entities\Language;
use Modules\Core\Languages\Entities\LanguageModel;
use Modules\Core\Languages\Factories\LanguageFactory;
use Modules\Core\Languages\Factories\ModelLanguageFactory;
use Modules\Core\Languages\Policies\AdminLanguagePolicy;
use Modules\Core\Languages\Policies\LaravelAdminLanguagePolicy;
use Modules\Core\Languages\Presenters\Admin\AdminCreateLanguage;
use Modules\Core\Languages\Presenters\Admin\AdminCreateLanguagePresenter;
use Modules\Core\Languages\Presenters\Admin\AdminDeleteLanguage;
use Modules\Core\Languages\Presenters\Admin\AdminDeleteLanguagePresenter;
use Modules\Core\Languages\Presenters\Admin\AdminGetLanguage;
use Modules\Core\Languages\Presenters\Admin\AdminGetLanguagePresenter;
use Modules\Core\Languages\Presenters\Admin\AdminIndexLanguages;
use Modules\Core\Languages\Presenters\Admin\AdminIndexLanguagesPresenter;
use Modules\Core\Languages\Presenters\Admin\AdminUpdateLanguage;
use Modules\Core\Languages\Presenters\Admin\AdminUpdateLanguagesPresenter;
use Modules\Core\Languages\Presenters\Internal\GetLanguage;
use Modules\Core\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Core\Languages\Repositories\EloquentLanguageRepository;
use Modules\Core\Languages\Repositories\LanguageRepository;

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
