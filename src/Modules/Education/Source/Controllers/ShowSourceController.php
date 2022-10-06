<?php

declare(strict_types=1);

namespace Modules\Education\Source\Controllers;

use Core\Extensions\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Education\Source\Presenters\Publics\PublicShowSourcePresenter;
use Modules\Education\Source\Resources\ShowSourceResource;

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
