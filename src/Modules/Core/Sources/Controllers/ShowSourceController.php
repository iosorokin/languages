<?php

declare(strict_types=1);

namespace Modules\Core\Sources\Controllers;

use Core\Extensions\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Core\Sources\Presenters\Publics\PublicShowSourcePresenter;
use Modules\Core\Sources\Resources\ShowSourceResource;

final class ShowSourceController
{
    public function __construct(
        private PublicShowSourcePresenter $userShowSourcePresenter,
    ) {}

    public function __invoke(Request $request): JsonResource
    {
        $source = ($this->userShowSourcePresenter)($request->all());

        return ShowSourceResource::make($source);
    }
}
