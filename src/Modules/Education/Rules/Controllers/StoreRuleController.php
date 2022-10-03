<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Controllers;

use Core\Extensions\Request;
use Core\Http\Controller;
use Core\Http\Responses\Json\CreatedResponse;
use Illuminate\Http\JsonResponse;
use Modules\Education\Rules\Presenters\User\UserCreateRulePresenter;

final class StoreRuleController extends Controller
{
    public function __construct(
        private UserCreateRulePresenter $createRule,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $rule = ($this->createRule)($request->all());

        return new CreatedResponse();
    }
}
