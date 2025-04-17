<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LogoutButton extends Component
{
    public function render()
    {
        return view('livewire.logout-button');
    }

    public function logout()
    {
        Auth::logout();
        session()->flash('success', 'Anda berhasil logout.'); // Optional: Menambahkan pesan setelah logout
        return redirect()->route('home'); // Redirect ke halaman yang sesuai
    }
}
