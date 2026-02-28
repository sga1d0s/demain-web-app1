<?php

namespace App\Livewire\Demo;

use Livewire\Component;
use App\Support\Demo\DemoOrders;

class OrderShow extends Component
{
    public string $code;
    public array $order = [];

    public function mount(string $code)
    {
        $this->code = $code;
        $this->order = DemoOrders::find($code) ?? [];

        abort_if(empty($this->order), 404);
    }

    public function render()
    {
        return view('livewire.demo.order-show')
            ->layout('layouts.demo');
    }
}