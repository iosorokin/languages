<?php

namespace App\Providers\Modules\Languages;

use App\Contracts\Presenters\Languages\Real\CreateRealLanguagePresenter;
use App\Contracts\Presenters\Languages\Real\DeleteRealLanguagePresenter;
use App\Contracts\Presenters\Languages\Real\ShowRealLanguagePresenter;
use App\Contracts\Presenters\Languages\Real\IndexRealLanguagesPresenter;
use App\Contracts\Presenters\Languages\Real\UpdateRealLanguagesPresenter;
use App\Contracts\Structures\Languages\RealLanguageStructure;
use Illuminate\Support\ServiceProvider;
use Modules\Languages\Real\Presenters\CreateRealLanguage;
use Modules\Languages\Real\Presenters\DeleteRealLanguage;
use Modules\Languages\Real\Presenters\ShowRealLanguage;
use Modules\Languages\Real\Presenters\IndexRealLanguages;
use Modules\Languages\Real\Presenters\UpdateRealLanguage;
use Modules\Languages\Real\Repositories\EloquentRealLanguageRepository;
use Modules\Languages\Real\Repositories\RealLanguageRepository;
use Modules\Languages\Real\Structures\RealLanguageModel;

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
        $this->app->bind(ShowRealLanguagePresenter::class, ShowRealLanguage::class);
        $this->app->bind(IndexRealLanguagesPresenter::class, IndexRealLanguages::class);
        $this->app->bind(UpdateRealLanguagesPresenter::class, UpdateRealLanguage::class);
    }
}
