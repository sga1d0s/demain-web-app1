<?php

namespace App\Livewire\Demo;

use Livewire\Component;

class Login extends Component
{
    public string $email = 'demo@demain.app';
    public string $password = 'demo';

    public function submit()
    {
        session(['demo_user' => [
            'name' => 'Sergio',
            'email' => $this->email,
            'role' => 'Admin',
        ]]);

        return redirect()->route('demo.orders');
    }

    public function render()
    {
        return view('livewire.demo.login')
            ->layout('layouts.demo');
    }
}