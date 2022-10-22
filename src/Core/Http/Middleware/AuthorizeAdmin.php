<?php

declare(strict_types=1);

namespace Core\Http\Middleware;

use App\Authorization\AdminAuthorization;
use Closure;
use Illuminate\Http\Request;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class AuthorizeAdmin
{
    public function __construct(
        private GetClientPresenter $getClient,
        private AdminAuthorization $authorization,
    ) {}

    public function handle(Request $request, Closure $next)
    {
        $client = ($this->getClient)();
        $this->authorization->authorize($client);

        return $next($request);
    }
}
