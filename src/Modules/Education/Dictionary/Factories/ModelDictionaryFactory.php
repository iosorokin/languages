<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Factories;

use Modules\Education\Dictionary\Entities\Dictionary;
use Modules\Education\Dictionary\Entities\DictionaryModel;
use Modules\Languages\Entities\Language;
use Modules\Personal\User\Entities\User;

final class ModelDictionaryFactory implements DictionaryFactory
{
    public function create(User $user, Language $language, array $attributes): Dictionary
    {
        $dictionary = new DictionaryModel();
        $dictionary->setUser($user);
        $dictionary->setLanguage($language);
        $dictionary->setTitle($attributes['title']);
        $dictionary->setDescription($attributes['description']);

        return $dictionary;
    }
}
