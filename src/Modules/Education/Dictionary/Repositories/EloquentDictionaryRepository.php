<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Repositories;

use App\Extensions\Assert;
use Modules\Education\Dictionary\Structures\DictionaryModel;
use Modules\Education\Dictionary\Structures\DictionaryStructure;

final class EloquentDictionaryRepository implements DictionaryRepository
{
    public function save(DictionaryStructure $dictionary): void
    {
        Assert::isInstanceOf($dictionary, DictionaryModel::class);
        $dictionary->save();
    }
}
