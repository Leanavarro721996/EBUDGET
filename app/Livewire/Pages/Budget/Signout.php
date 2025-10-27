<?php

namespace App\Livewire\Pages\Budget;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Signout extends Component
{
 
    public function render()
    {
        return view('livewire.pages.budget.signout');
    }
    public function logoutHandler() {
        // dd('logout');
        Auth::guard('web')->logout();
        session()->flush();
        return redirect()->route('login')->with('success','Log Out Successfully!');
        // return redirect()->to('/logout');
        // return redirect()->route('login')->with('success','Log Out Successfully!');
        
    }
}
                                                                          