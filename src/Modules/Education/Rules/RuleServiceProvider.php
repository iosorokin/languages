<?php

declare(strict_types=1);

namespace Modules\Education\Rules;

use Illuminate\Support\ServiceProvider;
use Modules\Education\Rules\Factories\ModelRuleFactory;
use Modules\Education\Rules\Factories\RuleFactory;
use Modules\Education\Rules\Policies\LaravelRulePolicy;
use Modules\Education\Rules\Policies\RulePolicy;
use Modules\Education\Rules\Presenters\User\UserCreateRule;
use Modules\Education\Rules\Presenters\User\UserCreateRulePresenter;
use Modules\Education\Rules\Repositories\EloquentRuleRepository;
use Modules\Education\Rules\Repositories\RuleRepository;

final class RuleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(UserCreateRulePresenter::class, UserCreateRule::class);
        $this->app->bind(RuleRepository::class, EloquentRuleRepository::class);
        $this->app->bind(RulePolicy::class, LaravelRulePolicy::class);
        $this->app->bind(RuleFactory::class, ModelRuleFactory::class);
    }
}
