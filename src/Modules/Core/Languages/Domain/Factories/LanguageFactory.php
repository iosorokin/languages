<?php

namespace Modules\Core\Languages\Domain\Factories;

use Core\Services\Pagination\CursorPaginator;
use Illuminate\Contracts\Pagination\CursorPaginator as LaravelCursorPaginator;
use Modules\Core\Languages\Domain\Collections\Languages;
use Modules\Core\Languages\Infrastructure\Model\Language;
use Modules\Personal\Infrastructure\Repository\EloquentUserModel;

class LanguageFactory
{
    public function create(EloquentUserModel $user, array $attributes): Language
    {
        $language = new Language();
        $language->user()->associate($user);
        $language->is_active = false;
        $this->fillAttributes($language, $attributes);

        return $language;
    }

    public function update(Language $language, array $attributes): Language
    {
        $language->is_active = $attributes['is_active'];
        $this->fillAttributes($language, $attributes);

        return $language;
    }

    public function collection(LaravelCursorPaginator $laravelPaginator): Languages
    {
        $paginator = new CursorPaginator($laravelPaginator);
        $languages = new Languages($laravelPaginator->getCollection());
        $languages->setPaginator($paginator);

        return $languages;
    }

    private function fillAttributes(Language $language, array $attributes): void
    {
        $language->name = $attributes['name'];
        $language->native_name = $attributes['native_name'];
        $language->code = $attributes['code'];
    }

    private function calculateVariables(Language $language, array $attributes): void
    {
        $language->setIsFavorite((bool)($attributes['favorite_id'] ?? false));
    }
}
