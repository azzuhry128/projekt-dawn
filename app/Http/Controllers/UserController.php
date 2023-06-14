<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerNewUser(Request $request)
    {
        $newUserRequestData = $this->getUserHttpRequest($request);
        $checkedData = $this->checkForDataDuplication($newUserRequestData);
        return $this->setAsNewUser($checkedData);
    }

    public function getUserHttpRequest($httpRequestData)
    {
        $username = $httpRequestData->username;
        $email = $httpRequestData->email;
        $password = $httpRequestData->password;

        $requestData = collect([
            'username' => $username,
            'email' => $email,
            'password' => $password
        ]);
        return $requestData;
    }

    public function checkForDataDuplication($checkUpData)
    {
        // print_r(var_dump($checkUpData));
        // print_r($checkUpData['username']);

        $username = $checkUpData['username'];
        $email = $checkUpData['email'];

        $query = Accounts::where('username', $username)->where('email', $email);

        if ($query->exists()) {
            $mergedCheckupData = $checkUpData->merge(['status' => 'duplication']);
            return $mergedCheckupData;
        } else {
            $mergedCheckupData = $checkUpData->merge(['status' => 'safe']);
            return $mergedCheckupData;
        }
    }

    public function setAsNewUser($userCandidateData)
    {

        if ($userCandidateData['status'] == 'duplication') {
            return response()->json(["status" => "rejected"]);
        } else {

            // $account = new Accounts;
            // $account->username = $userCandidateData->username;
            // $account->email = $userCandidateData->email;
            // $account->password = $userCandidateData->password;
            // $account->save();
            return response()->json(['status' => "new user added"]);
        }
    }



    public function verifyNewUser()
    {
        //TODO verifying user via codes sent to email
    }

    //TODO user login mechanism, must be able to translate bcrypt
}