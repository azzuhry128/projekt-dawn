<?php

namespace App\Http\Middleware;

use App\Models\Account;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

use Ramsey\Uuid\Uuid;

class DoppelChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $newUserid = Uuid::uuid4();
        $username = $request->input("username");
        $email = $request->input("email");
        $password = $request->input("password");

        $accountQuery = Account::where([
            "username" => $username,
            "email" => $email,
        ]);

        if (!$accountQuery->exists()) {
            $request->merge([
                "passport" => [
                    "id" => $newUserid,
                    "username" => $username,
                    "email" => $email,
                    "password" => Hash::make($password),
                ],
                "status" => [
                    "status code" => "200",
                    "request" => "accepted"
                ]
            ]);

        } else {
            $request->merge([
                "passport" => [
                    "id" => "",
                    "username" => $username,
                    "email" => $email,
                    "password" => $password,
                ],
                "status" => [
                    "status code" => "417",
                    "request" => "rejected",
                    "cause" => "duplicate data",
                ]
            ]);
        }

        return $next($request);
    }
}