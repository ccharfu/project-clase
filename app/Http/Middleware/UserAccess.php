<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth('api')->user()) {
            return response()->json(['You do not have permission to access for this page.'], 401);
        } else {
            $user = auth('api')->user();
            error_log('usuario>' . $user);
            error_log('id>' . $user->id);

            // error_log("metodo=" . $request->method());
            // error_log("ruta=" . $request->path());

            // $cad_method = $request->method();
            // $cad_path = $request->path();

            return $next($request);
        }
        // return $next($request);
    }
}

