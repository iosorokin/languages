<?php

namespace Modules\Core\Languages\Factories;

use Modules\Core\Languages\Entities\Language;
use Modules\Core\Languages\Entities\LanguageModel;
use Modules\Core\Languages\Validators\CreateLanguageValidator;
use Modules\Personal\User\Entities\User;

class ModelLanguageFactory implements LanguageFactory
{
    public function __construct(
        private CreateLanguageValidator $createLanguageValidator,
    ) {}

    public function new(User $user, array $attributes): Language
    {
        $attributes = $this->createLanguageValidator->validate($attributes);

        $language = new LanguageModel();
        $language->setUser($user);
        $language->name = $attributes['name'];
        $language->native_name = $attributes['native_name'];
        $language->code = $attributes['code'];

        return $language;
    }
}
