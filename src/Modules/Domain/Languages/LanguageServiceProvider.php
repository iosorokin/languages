<?php

namespace Modules\Domain\Languages;

use Illuminate\Support\ServiceProvider;
use Modules\Domain\Languages\Actions\CreateLanguage;
use Modules\Domain\Languages\Actions\IndexLanguages;
use Modules\Domain\Languages\Actions\ShowLanguage;
use Modules\Domain\Languages\Entities\Language;
use Modules\Domain\Languages\Entities\LanguageModel;
use Modules\Domain\Languages\Factories\EntityLanguageFactory;
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
use Modules\Domain\Languages\Presenters\Guest\GuestIndexLanguages;
use Modules\Domain\Languages\Presenters\Guest\GuestIndexLanguagesPresenter;
use Modules\Domain\Languages\Presenters\Guest\GuestShowLanguage;
use Modules\Domain\Languages\Presenters\Guest\GuestShowLanguagePresenter;
use Modules\Domain\Languages\Presenters\Internal\GetLanguage;
use Modules\Domain\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Domain\Languages\Repositories\EloquentLanguageRepository;
use Modules\Domain\Languages\Repositories\EntityLanguageRepository;
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
        $this->bindFactory();
        $this->bindRepository();

        $this->app->bind(Language::class, LanguageModel::class);

        $this->app->bind(AdminCreateLanguagePresenter::class, AdminCreateLanguage::class);
        $this->app->bind(AdminDeleteLanguagePresenter::class, AdminDeleteLanguage::class);
        $this->app->bind(AdminGetLanguagePresenter::class, AdminGetLanguage::class);
        $this->app->bind(AdminIndexLanguagesPresenter::class, AdminIndexLanguages::class);
        $this->app->bind(AdminUpdateLanguagesPresenter::class, AdminUpdateLanguage::class);

        $this->app->bind(GuestShowLanguagePresenter::class, GuestShowLanguage::class);

        $this->app->bind(LanguagePolicy::class, LaravelLanguagePolicy::class);

        $this->app->bind(GetLanguagePresenter::class, GetLanguage::class);
        $this->app->bind(GuestIndexLanguagesPresenter::class, GuestIndexLanguages::class);
    }

    private function bindFactory()
    {
        // действия на запись отдаются в eloquent модель
        $this->app->when([CreateLanguage::class])
            ->needs(LanguageFactory::class)
            ->give(ModelLanguageFactory::class);

        // действия на чтение отдаются сырым сущностям
        $this->app->when([ShowLanguage::class, IndexLanguages::class])
            ->needs(LanguageFactory::class)
            ->give(EntityLanguageFactory::class);
    }

    private function bindRepository()
    {
        $this->app->when([CreateLanguage::class])
            ->needs(LanguageRepository::class)
            ->give(EloquentLanguageRepository::class);

        $this->app->when([ShowLanguage::class, IndexLanguages::class])
            ->needs(LanguageRepository::class)
            ->give(EntityLanguageRepository::class);
    }
}
