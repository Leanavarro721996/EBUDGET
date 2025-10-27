<?php

namespace App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Auth;


use Livewire\Component;

class Login extends Component

{
    public $email;
    public $password;
    public $designation;
    public function render()
    {
        return view('livewire.auth.login.login');
    }

    public function login()
    {
        //  dd('log in');
        $this->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);
    
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // Authentication successful
    
            // Retrieve user information
            $user = Auth::user();
    
            // Store user information in the session
            session([
                'user' => [
                    'name' => $user->name
                   
                ]
            ]);
    
            session()->flash('success', 'Login successful.');
            return redirect()->route('dashboard');
        } else {
            // Authentication failed
            session()->flash('error', 'Incorrect Email or Password.');
        }
    }
    

        // Authentication successful

        // Retrieve user information
  

}
