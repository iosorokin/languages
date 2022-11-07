<?php

namespace Domain\Core\Languages\Domain\Factories;

use Domain\Core\Languages\Domain\Collections\Languages;
use Domain\Core\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;
use Illuminate\Contracts\Pagination\CursorPaginator as LaravelCursorPaginator;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Infrastructure\Services\Pagination\CursorPaginator;

class LanguageFactory
{
    public function create(EloquentUserModel $user, array $attributes): LanguageModel
    {
        $language = new LanguageModel();
        $language->user()->associate($user);
        $language->is_active = false;
        $this->fillAttributes($language, $attributes);

        return $language;
    }

    public function update(LanguageModel $language, array $attributes): LanguageModel
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

    private function fillAttributes(LanguageModel $language, array $attributes): void
    {
        $language->name = $attributes['name'];
        $language->native_name = $attributes['native_name'];
        $language->code = $attributes['code'];
    }

    private function calculateVariables(LanguageModel $language, array $attributes): void
    {
        $language->setIsFavorite((bool)($attributes['favorite_id'] ?? false));
    }
}
