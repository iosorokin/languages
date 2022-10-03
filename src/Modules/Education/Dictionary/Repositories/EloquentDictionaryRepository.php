<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Repositories;

use App\Extensions\Assert;
use Modules\Education\Dictionary\Entity\DictionaryModel;
use Modules\Education\Dictionary\Entity\Dictionary;

final class EloquentDictionaryRepository implements DictionaryRepository
{
    public function save(Dictionary $dictionary): void
    {
        Assert::isInstanceOf($dictionary, DictionaryModel::class);
        $dictionary->save();
    }
}
