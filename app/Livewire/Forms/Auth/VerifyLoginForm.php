<?php

namespace App\Livewire\Forms\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class VerifyLoginForm extends Form
{
    #[Validate('required|email')]
    public $email;

    #[Validate('required')]
    public $password;

    public $remember_me = false;

    public function verify()
    {
        $user = User::query()->where('email', $this->email)->first();
        if (!$user || !Hash::check($this->password, $user->password)) {
            throw ValidationException::withMessages([
                'form.email' => 'Email salah!',
                'form.password' => 'Password Salah!'
            ]);
        }

        Auth::login($user, $this->remember_me);
    }
}
