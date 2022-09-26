<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Controllers;

use Core\Extensions\Request;
use Core\Http\Controller;
use Core\Http\Responses\Json\NoContentResponse;
use Modules\Education\Rules\Presenters\CreateRulePresenter;

final class StoreRuleController extends Controller
{
    public function __construct(
        private CreateRulePresenter $createRule,
    ) {}

    public function __invoke(Request $request)
    {
        $rule = ($this->createRule)($request->all());

        return new NoContentResponse();
    }
}
