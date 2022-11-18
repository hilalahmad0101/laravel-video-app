<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $username, $password;
    public function render()
    {
        return view('livewire.admin.login')->layout('layout.admin-app');
    }

    public function login()
    {
        $this->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $admin = Auth::attempt(['username' => $this->username, 'password' => $this->password]);
        if ($admin) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Login Successfully"
            ]);
            $this->username = "";
            $this->password = "";
            return redirect(route('admin.post'));
        } else {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Invalid username and password"
            ]);
        }
    }
}
