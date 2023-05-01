<?php

namespace App\Http\Livewire;

use App\Models\Account;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Request;

class RegistrationPage extends Component
{
    public $registUsername;
    public $registEmail;
    public $registPassword;

    public function registMethod()
    {
        $this->duplicateData();
        $this->logRegistrationInput();
        $this->webAlert();
        // $this->saveAccount();
    }

    public function logRegistrationInput()
    {
        $inputArray = array(
            "username input" => $this->registUsername,
            "email input" => $this->registEmail,
        );

        error_log(json_encode($inputArray));
    }

    public function duplicateData()
    {
        $usernameQuery = Account::where('username', $this->registUsername)->value('username');
        $emailQuery = Account::where('email', $this->registEmail)->value('email');

        if ($usernameQuery && $emailQuery) {
            // error_log("username and email is already taken");
            $this->dispatchBrowserEvent('swal:alertBoth');

        } elseif ($usernameQuery == '' && $emailQuery) {
            // error_log("email is already taken");
            $this->dispatchBrowserEvent('swal:alertEmail');

        } elseif ($usernameQuery && $emailQuery == '') {
            // error_log("username is already taken");
            $this->dispatchBrowserEvent('swal:alertUsername');

        } else {
            $this->dispatchBrowserEvent("swal:clear");
        }
    }

    public function webAlert()
    {
        $this->dispatchBrowserEvent('registAlert');
    }

    public function saveAccount()
    {
        $encrypted = bcrypt($this->registPassword);

        Account::create([
            'id' => date('YmdHis'),
            'username' => $this->registUsername,
            'email' => $this->registEmail,
            'password' => $encrypted
        ]);
    }

    public function render()
    {
        return view('livewire.registration-page');
    }
}