<?php

namespace App\Http\Middleware;

use App\Models\Account;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DoppelChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $registUsername, string $registEmail): Response
    {
        $duplicate = false;

        if (Account::where('username', $registUsername)->exists()) {
            $duplicate = true;
        } elseif (Account::where('email', $registEmail)->exists()) {
            $duplicate = true;
        } else {
            $duplicate = false;
        }

        if ($duplicate) {
            $request->attributes->add(['duplicate' => $duplicate]);
            error_log($request);
            return redirect()->back()->withErrors("duplicate data detected");
        } else {
            return $next($request);
        }
    }

}