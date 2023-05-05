<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getRegistrationPage()
    {
        return "welcome to registration page!";
    }
    public function storeNewUser(Request $request)
    {
        if ($request->input("request") == "accepted") {

            $newAccount = new Account;

            $newAccount->username = $request->input("username");
            $newAccount->email = $request->input("email");
            $newAccount->password = $request->input("password");

            $newAccount->save();

            return response("data successfully inserted into database");
        } else {
            return response("duplicate detected");
        }


    }
}