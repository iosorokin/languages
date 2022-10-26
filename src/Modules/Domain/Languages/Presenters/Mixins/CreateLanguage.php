<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Mixins;

use App\Database\Personal\EloquentUserModel;
use Modules\Domain\Languages\Factories\LanguageFactory;
use Modules\Domain\Languages\Model\Language;
use Modules\Domain\Languages\Validators\CreateLanguageValidator;

final class CreateLanguage
{
    public function __construct(
        private LanguageFactory $factory,
        private CreateLanguageValidator $validator,
    ) {}

    public function __invoke(EloquentUserModel $user, array $attributes): Language
    {
        $attributes = $this->validator->validate($attributes);
        $language = $this->factory->create($user, $attributes);
        $language->save();

        return $language;
    }
}
