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
    public function handle(Request $request, Closure $next): Response
    {
        $username = $request->input("username");
        $email = $request->input("email");
        $password = $request->input("password");

        $accountQuery = Account::where([
            "username" => $username,
            "email" => $email,
        ]);

        if (!$accountQuery->exists()) {
            $request->merge([
                "status" => "200",
                "request" => "accepted",
                "username" => $username,
                "email" => $email,
                "password" => $password,
                "middleware" => "DoppelChecker"
            ]);

        } else {
            $request->merge([
                "status" => "417",
                "request" => "rejected",
                "cause" => "duplicate data",
                "middleware" => "DoppelChecker",
            ]);

        }

        return $next($request);
    }
}