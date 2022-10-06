<?php

namespace Modules\Domain\Languages\Presenters\Admin;

use Modules\Domain\Languages\Actions\CreateLanguage;
use Modules\Domain\Languages\Entities\Language;
use Modules\Domain\Languages\Policies\AdminLanguagePolicy;

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
