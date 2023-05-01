<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginPage extends Component
{
    public $pageName;
    public $pageStatus;


    public function mount()
    {
        $this->pageName = "login page";
        $this->pageStatus = "in development";
    }

    public function render()
    {
        return view('livewire.login-page');
    }
}