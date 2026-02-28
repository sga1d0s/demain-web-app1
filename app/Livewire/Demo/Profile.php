<?php

namespace App\Livewire\Demo;

use Livewire\Component;

class Profile extends Component
{
    public array $user = [];

    public function mount()
    {
        $this->user = session('demo_user', [
            'name' => 'Demo User',
            'email' => 'demo@demain.app',
            'role' => 'Viewer',
        ]);
    }

    public function logout()
    {
        session()->forget('demo_user');
        return redirect()->route('demo.login');
    }

    public function render()
    {
        return view('livewire.demo.profile')
            ->layout('layouts.demo');
    }
}