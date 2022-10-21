<?php

namespace Modules\Domain\Languages\Factories\Structure;

use Illuminate\Contracts\Pagination\CursorPaginator;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Structures\Language;
use Modules\Personal\User\Structures\User;

interface LanguageStructureFactory
{
    public function create(User $user, array $attributes): Language;

    public function restore(array $attributes, ?User $user = null): Language;

    public function collection(CursorPaginator $paginator): Languages;

    public function update(Language $language, array $attributes, ?User $user = null);
}
