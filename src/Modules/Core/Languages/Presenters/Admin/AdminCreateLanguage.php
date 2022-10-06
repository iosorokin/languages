<?php

namespace Modules\Core\Languages\Presenters\Admin;

use Modules\Core\Languages\Actions\CreateLanguage;
use Modules\Core\Languages\Entities\Language;
use Modules\Core\Languages\Policies\AdminLanguagePolicy;

class AdminCreateLanguage implements AdminCreateLanguagePresenter
{
    public function __construct(
        private AdminLanguagePolicy  $policy,
        private CreateLanguage $createLanguage,
    ) {}

    public function __invoke(array $attributes): Language
    {
        $client = $this->policy->canCreate();
        $language = ($this->createLanguage)($client->user(), $attributes);

        return $language;
    }
}
