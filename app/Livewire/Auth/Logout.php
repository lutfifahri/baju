<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Logout extends Component
{
    use LivewireAlert;

    public $listeners = ['confirmedLogout'];

    public function logout()
    {
        $this->confirm('Apakah anda yakin?', [
            'text' => 'Anda akan keluar dari aplikasi!',
            'onConfirmed' => 'confirmedLogout',
        ]);
    }

    public function confirmedLogout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
}
