<?php

namespace App\Http\Middleware;

use Closure;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws \Exception
     */
    public function __invoke($request, Closure $next)
    {
        return $next($request);

        /** @var Request $request */
        $authpn = $request->get('authpn');
        $authpt = $request->get('authpt');
        if (!$authpn || !$authpt) {
            // TODO: chance to custom Exception example: AuthException
            throw new \Exception();
        } else {
            $config = config('auth.partners')[$authpn];
            if ($config['token'] != $authpt) {
                // TODO: chance to custom Exception example: AuthException
                throw new \Exception();
            } else {
                $request->attributes->add(['auth' => $config]);
            }
        }

        return $next($request);
    }

}
