<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\VerifyLoginForm;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Login extends Component
{
    public VerifyLoginForm $form;

    public function save()
    {
        $this->form->verify();

        $this->redirectRoute('dashboard');
    }

    public function render()
    {
        return view('livewire.auth.login', [
            'page_meta' => [
                'title' => 'Selamat Datang Di Aplikasi Penjualan',
                'form'  => [
                    'action' => 'save',
                ],
            ],
        ]);
    }
}
