<?php

declare(strict_types=1);

namespace Infrastructure\Database\Repositories\Eloquent\Language;


use App\Repositories\Eloquent\Language\Language;
use Domain\Core\Languages\Model\Manager\ManagerLanguageRepository;

final class EloquentManagerLanguageRepository implements ManagerLanguageRepository
{
    public function add(Language $language): void
    {

    }
}
