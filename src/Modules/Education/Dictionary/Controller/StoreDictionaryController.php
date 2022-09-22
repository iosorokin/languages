<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Controller;

use Core\Extensions\Request;
use Core\Http\Controller;
use Modules\Education\Dictionary\Presenters\CreateDictionary;

final class StoreDictionaryController extends Controller
{
    public function __construct(
        private CreateDictionary $createDictionary,
    ) {}

    public function __invoke(Request $request)
    {
        $attributes = $request->all();
        ($this->createDictionary)($attributes);
    }
}
