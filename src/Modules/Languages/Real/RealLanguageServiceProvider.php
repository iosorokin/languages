<?php

namespace Modules\Languages\Real;

use Illuminate\Support\ServiceProvider;
use Modules\Languages\Real\Presenters\CreateRealLanguage;
use Modules\Languages\Real\Presenters\CreateRealLanguagePresenter;
use Modules\Languages\Real\Presenters\DeleteRealLanguage;
use Modules\Languages\Real\Presenters\DeleteRealLanguagePresenter;
use Modules\Languages\Real\Presenters\GetRealLanguage;
use Modules\Languages\Real\Presenters\GetRealLanguagePresenter;
use Modules\Languages\Real\Presenters\GetRealLanguages;
use Modules\Languages\Real\Presenters\IndexRealLanguagesPresenter;
use Modules\Languages\Real\Presenters\UpdateRealLanguage;
use Modules\Languages\Real\Presenters\UpdateRealLanguagesPresenter;
use Modules\Languages\Real\Repositories\EloquentRealLanguageRepository;
use Modules\Languages\Real\Repositories\RealLanguageRepository;
use Modules\Languages\Real\Structures\RealLanguageModel;
use Modules\Languages\Real\Structures\RealLanguageStructure;

class RealLanguageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(RealLanguageRepository::class, EloquentRealLanguageRepository::class);

        $this->app->bind(RealLanguageStructure::class, RealLanguageModel::class);

        $this->app->bind(CreateRealLanguagePresenter::class, CreateRealLanguage::class);
        $this->app->bind(DeleteRealLanguagePresenter::class, DeleteRealLanguage::class);
        $this->app->bind(GetRealLanguagePresenter::class, GetRealLanguage::class);
        $this->app->bind(IndexRealLanguagesPresenter::class, GetRealLanguages::class);
        $this->app->bind(UpdateRealLanguagesPresenter::class, UpdateRealLanguage::class);
    }
}
