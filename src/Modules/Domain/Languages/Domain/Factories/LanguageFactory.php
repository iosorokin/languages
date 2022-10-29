<?php

namespace Modules\Domain\Languages\Domain\Factories;

use Core\Services\Pagination\CursorPaginator;
use Illuminate\Contracts\Pagination\CursorPaginator as LaravelCursorPaginator;
use Modules\Domain\Languages\Domain\Collections\Languages;
use Modules\Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;
use Modules\Personal\Infrastructure\Repository\Eloquent\EloquentUserModel;

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
