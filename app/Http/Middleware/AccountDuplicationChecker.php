<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Accounts;
use Symfony\Component\HttpFoundation\Response;

class AccountDuplicationChecker
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Accounts::where('username', $request->username)->where('email', $request->email)) {

            $request->merge(["status" => "duplication detected"]);
            return $next($request);
        } else {
            $request->merge(["status" => "no duplication detected"]);
            return $next($request);

        }
    }
}