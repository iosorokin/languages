<?php

declare(strict_types=1);

namespace Modules\Languages\Common;

use Illuminate\Support\ServiceProvider;
use Modules\Languages\Common\Presenters\GetLanguage;
use Modules\Languages\Common\Presenters\GetLanguagePresenter;

final class LanguageModuleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(GetLanguagePresenter::class, GetLanguage::class);
    }
}
