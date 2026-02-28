<?php

namespace App\Livewire\Demo;

use Livewire\Component;
use App\Support\Demo\DemoOrders;

class OrdersIndex extends Component
{
    public string $q = '';
    public string $status = 'all';

    public function getOrdersProperty(): array
    {
        $orders = DemoOrders::all();

        if ($this->status !== 'all') {
            $orders = array_values(array_filter($orders, fn($o) => $o['status'] === $this->status));
        }

        if (trim($this->q) !== '') {
            $q = mb_strtolower(trim($this->q));
            $orders = array_values(array_filter($orders, function ($o) use ($q) {
                return str_contains(mb_strtolower($o['code']), $q)
                    || str_contains(mb_strtolower($o['title']), $q)
                    || str_contains(mb_strtolower($o['client']), $q);
            }));
        }

        return $orders;
    }

    public function render()
    {
        return view('livewire.demo.orders-index')
            ->layout('layouts.demo');
    }
}