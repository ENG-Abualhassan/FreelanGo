<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , string $guard): Response
    {
        // For check if the $guard have a space or something else it will be return json responce status 400 error
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $guard)) {
            return response()->json([
                'success' => false,
                'message' => 'محاولة وصول غير صالحة'
            ], 400);
        }
        if(!Auth::guard($guard)->check()){
            // if the request is ajax and the request want a json response it will return a json
            if($request->ajax() || $request->wantsJson()){
                return response()->json(['success' => false , 'message' => 'غير مسموح بالدخول'],401);
            }
            // if the request is a preventDefault it will redirect the user for the route as it guard
            return redirect()->route("$guard.login");
        }
        return $next($request);
    }
}
