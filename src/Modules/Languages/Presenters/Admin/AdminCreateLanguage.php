<?php

namespace Modules\Languages\Presenters\Admin;

use Core\Base\Presenter;
use Modules\Languages\Actions\CreateLanguage;
use Modules\Languages\Entity\Language;
use Modules\Languages\Policies\AdminLanguagePolicy;

class AdminCreateLanguage extends Presenter implements AdminCreateLanguagePresenter
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
