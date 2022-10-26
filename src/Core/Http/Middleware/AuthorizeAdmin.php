<?php

declare(strict_types=1);

namespace Core\Http\Middleware;

use App\Authorization\AdminAuthorization;
use App\Controllers\Auth\Internal\GetAuthUser;
use Closure;
use Illuminate\Http\Request;

final class AuthorizeAdmin
{
    public function __construct(
        private GetAuthUser        $getAuthUser,
        private AdminAuthorization $authorization,
    ) {}

    public function handle(Request $request, Closure $next)
    {
        $auth = ($this->getAuthUser)();
        $this->authorization->authorize($auth);

        return $next($request);
    }
}
