<?php

namespace App\Livewire\Demo;

use Livewire\Component;

class OrderNew extends Component
{
    public string $client = 'Demain IT';
    public string $title = '';
    public string $priority = 'Media';
    public string $summary = '';

    public function submit()
    {
        // En demo no guardamos: simulamos “creada” y vamos a un detalle existente o a la lista
        session()->flash('demo_toast', 'Orden creada (demo).');
        return redirect()->route('demo.orders.show', 'WO-1002');
    }

    public function render()
    {
        return view('livewire.demo.order-new')
            ->layout('layouts.demo');
    }
}