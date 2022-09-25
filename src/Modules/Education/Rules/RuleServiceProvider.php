<?php

declare(strict_types=1);

namespace Modules\Education\Rules;

use Illuminate\Support\ServiceProvider;
use Modules\Education\Rules\Presenters\CreateRule;
use Modules\Education\Rules\Presenters\CreateRulePresenter;

final class RuleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(CreateRulePresenter::class, CreateRule::class);
    }
}
