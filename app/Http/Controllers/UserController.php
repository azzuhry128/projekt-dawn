<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
{
    public function getRegistrationPage()
    {
        return "welcome to registration page!";
    }
    public function storeNewUser(Request $request)
    {
        $newUserId = Uuid::uuid4();

        if ($request->input("status.request" ) == "accepted") {

            $newAccount = new Account;

            $newAccount->id = $newUserId;
            $newAccount->username = $request->input("username");
            $newAccount->email = $request->input("email");
            $newAccount->password = Hash::make($request->input("password"));

            $newAccount->save();

            return response($request->only(['passport', 'status']));
        } else {
            return response($request->only(['passport', 'status']));
        }
    }
}