<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Repositories;

use App\Base\Repository\BaseSqlRepository;
use Illuminate\Support\Facades\DB;
use Modules\Domain\Languages\Factories\Structure\EntityLanguageStructureFactory;
use Modules\Domain\Languages\Structures\Language;

final class EntityLanguageRepository extends BaseSqlRepository implements LanguageRepository
{
    public function __construct(
        private EntityLanguageStructureFactory $factory
    ) {}

    public function save(Language $language): void
    {
        // TODO: Implement save() method.
    }

    public function get(int $id): ?Language
    {
        $language = DB::table('languages')
            ->where('id', $id)
            ->first();

        if ($language) {
            $language = $this->factory->restore((array) $language);
        }

        return $language;
    }

    public function delete(Language $language): void
    {
        // TODO: Implement delete() method.
    }
}
